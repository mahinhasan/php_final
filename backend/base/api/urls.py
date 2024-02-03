from . import views
from .views import *
from django.urls import path

urlpatterns = [
    path('tours/',views.getTour,name='tour'),
    
    
]
