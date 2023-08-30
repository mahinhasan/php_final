from rest_framework.serializers import ModelSerializer
from base.models import Tour


class TourSerialiazer(ModelSerializer):
    class Meta:
        model = Tour
        fields = '__all__'