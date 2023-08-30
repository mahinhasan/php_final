from django.shortcuts import render,redirect
from django.http import HttpResponse
from django.contrib.auth import authenticate,login,logout
from django.db.models import Q
from django.contrib.auth.models import User
from django.contrib.auth.decorators import login_required
from django.contrib.auth.forms import UserCreationForm
from .models import Tour,Place,Message
from .forms import TourForm,UserForm
from django.contrib import messages



def home(request):
    q = request.GET.get('q') if request.GET.get('q') != None else ''
    tours = Tour.objects.filter(
        Q(place__name__icontains=q) | 
        Q(title__icontains=q)|
        Q(host__username__icontains=q)
        )
    places = Place.objects.all()
    tour_messages = Message.objects.filter(Q(tour__place__name__icontains=q))
    context = {'tours':tours,'places':places,'tour_messages':tour_messages}
    return render(request,'base/home.html',context)

@login_required(login_url='login')
def createTour(request):
    form = TourForm()
    places = Place.objects.all()
    
    if request.method == 'POST':
        place = request.POST.get('place')
        place,created = Place.objects.get_or_create(name=place)
        Tour.objects.create(
            host = request.user,
            place=place,
            title = request.POST.get('title'),
            description = request.POST.get('description')
            
        )
        # form = TourForm(request.POST)
        # if form.is_valid():
        #     tour = form.save(commit=False)
        #     tour.host = request.user
        #     tour.save()
        return redirect('home')
                
    context = {'form':form,'places':places}
    
    return render(request,'base/createTour.html',context)

# @login_required(login_url='login')
def detailsTour(request,pk):
    tour = Tour.objects.get(id=pk)
    tour_messages = tour.message_set.all().order_by('-created')
    participants = tour.participants.all()
    if request.method == 'POST':
        message = Message.objects.create(
            user = request.user,
            tour = tour,
            body = request.POST.get('msg')
            
        )
        tour.participants.add(request.user)
        return redirect('details',pk=tour.id)
    
    context = {'tour':tour,'tour_messages':tour_messages,'participants':participants}
    return render(request,'base/tourDetails.html',context)


@login_required(login_url='login')
def updateTour(request,pk):
    tour = Tour.objects.get(id=pk)
    form = TourForm(instance=tour)
    places = Place.objects.all()
    if request.user != tour.host:
        return HttpResponse('You are not allowd to update...')
    
    if request.method=='POST':
        place = request.POST.get('place')
        place,created = Place.objects.get_or_create(name=place)
        tour.place=place
        tour.title = request.POST.get('title')
        
        tour.description = request.POST.get('description')
        tour.save()
        # form = TourForm(request.POST,instance=tour)
        # if form.is_valid():
        #     form.save()
        return redirect('home')
    
    context = {'form':form,'places':places,'tour':tour}
    return render(request,'base/createTour.html',context,)

@login_required(login_url='login')
def updateMessage(request,pk):
    pass
    # tour_message = Message.objects.get(id=pk)
    # form = TourForm(instance=tour_message)
    
    # if request.user != tour_message.host:
    #     return HttpResponse('You are not allowd to update...')
    
    # if request.method=='POST':
    #     form = TourForm(request.POST,instance=tour_message)
    #     if form.is_valid():
    #         form.save()
    #         return redirect('home')
    
    # context = {'form':form}
    # return render(request,'base/tourForm.html',context)

@login_required(login_url='login')
def deleteTour(request,pk):
    tour = Tour.objects.get(id=pk)
    if request.user != tour.host:
        return HttpResponse('You are not allowd to update...')
    
    if request.method=='POST':
        tour.delete()
        return redirect('home')
    
    context = {'obj':tour}
    return render(request,'base/deleteTour.html',context)

@login_required(login_url='login')
def deleteMessage(request,pk):
    tour_message = Message.objects.get(id=pk)
    if request.user != tour_message.user:
        return HttpResponse('You are not allowd to update...')
    
    if request.method=='POST':
        tour_message.delete()
        return redirect('home')
    
    context = {'obj':tour_message}
    return render(request,'base/deleteTour.html',context)

def about(request):
    return render(request,'base/about.html')

# Authenticate

def loginPage(request):
    page = 'login'
    if request.user.is_authenticated:
        return redirect('home')
    
    if request.method == "POST":
        username = request.POST.get('username')
        password = request.POST.get('password')
        
        try:
            user = User.objects.get(username=username)
            
        except:
            messages.error(request, "User doesn't exist.")
        user = authenticate(request,username=username,password=password)
        
        if user is not None:
            login(request,user)
            return redirect('home')
        else:
            messages.error(request,'user doesnt exist')
    
    context = {'page':page}
    
    return render(request,'base/login_register.html',context)

def logoutPage(request):
    logout(request)
    return redirect('home') 

def registerUser(request):
    page = 'register'
    form = UserCreationForm()
    
    if request.method == 'POST':
        form = UserCreationForm(request.POST)
        if form.is_valid():
            user = form.save(commit=False)
            user.username = user.username.lower()
            user.save()
            login(request,user)
            return redirect('home')
        else:
            messages.error(request,'An error occured!')
    
    context = {'page':page,'form':form}
    
    return render(request,'base/login_register.html',context)


# Profile

def userProfile(request ,pk):
    user = User.objects.get(id=pk)
    tours = user.tour_set.all()
    tour_messages = user.message_set.all()
    places = Place.objects.all()
    context = {'user':user,'tours':tours,'tour_messages':tour_messages,'places':places}
    
    return render(request,'base/profile.html' ,context)


@login_required(login_url='login')
def updateUser(request):
    user = request.user
    form = UserForm(instance=user)

    if request.method == 'POST':
        form = UserForm(request.POST, request.FILES, instance=user)
        if form.is_valid():
            form.save()
            return redirect('user-profile', pk=user.id)

    return render(request, 'base/edit-user.html', {'form': form})