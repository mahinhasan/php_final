from rest_framework.decorators import api_view
from rest_framework.response import Response
from base.models import Tour
from .serializers import TourSerialiazer

    
    
    
@api_view(['GET'])
def getTour(request):
    tour = Tour.objects.all()
    serialiazer = TourSerialiazer(tour,many=True)
    return Response(serialiazer.data)