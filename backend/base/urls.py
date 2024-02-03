from django.urls import path
from . import views
from .views import *

urlpatterns = [
    # authenticate
    path("login/",views.loginPage,name="login"),
    path("logout/",views.logoutPage,name="logout"),
    path("register/",views.registerUser,name="register"),
    
    # webpage
    path("", views.home, name="home"),
    path("details/<str:pk>/", views.detailsTour, name="details"),
    path("create-tour/",views.createTour,name="create-tour"),
    path("update-tour/<str:pk>/",views.updateTour,name="update-tour"),
    path("delete-tour/<str:pk>/",views.deleteTour,name="delete-tour"),
    path("edit-message/<str:pk>/",views.updateMessage,name="edit-message"),
    path("delete-message/<str:pk>/",views.deleteMessage,name="delete-message"),
    path("about/", views.about, name="about"),
    
    # Profile
    path("user-profile/<str:pk>/",views.userProfile,name="user-profile"),
    path("edit-user/",views.updateUser,name="edit-user"),
    
]
