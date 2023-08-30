from django.forms import ModelForm
from .models import Tour
from django.contrib.auth.models import User


class TourForm(ModelForm):
    class Meta:
        model = Tour
        fields = '__all__'
        exclude = ['host','participants']
        
        


class UserForm(ModelForm):
    class Meta:
        model = User
        fields = [ 'username', 'email']
