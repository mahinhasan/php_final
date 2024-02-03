from django.db import models
from django.contrib.auth.models import User
# Create your models here.

class Place(models.Model):
    name = models.CharField(max_length=200)
    
    def __str__(self):
        return self.name




class Tour(models.Model):
    
    host = models.ForeignKey(User,on_delete=models.SET_NULL,null=True)
    place = models.ForeignKey(Place,on_delete=models.SET_NULL,null=True)
    
    title = models.CharField(max_length=300)
    description = models.TextField(null=True,blank=True)
    participants = models.ManyToManyField(User,related_name='participants',blank=True) 
    updated = models.DateTimeField(auto_now=True)
    created = models.DateTimeField(auto_now_add=True)
    
    class Meta:
        ordering = ['-updated','-created']
    
    def __str__(self):
        return self.title
    

class Message(models.Model):
    user = models.ForeignKey(User,on_delete=models.CASCADE)
    tour = models.ForeignKey(Tour,on_delete=models.CASCADE)
    body = models.TextField()
    updated = models.DateTimeField(auto_now=True)
    created = models.DateTimeField(auto_now_add=True)
    
    def __str__(self):
        return self.body[0:10]
    
