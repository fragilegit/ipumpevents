<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyATj3nXIlTh6atBzhuGuCiuM8sPtU5bw&callback=initMap" async defer></script>
<script>
    
    function initMap(){
        var lat = {{$event->lat}};
        var lng = {{$event->lng}};

        map = new google.maps.Map(document.getElementById('map-canvas'),{
        center: {lat: lat, lng: lng},
        zoom: 15
    });
    marker = new google.maps.Marker({
        position:{
            lat: lat,
            lng: lng
        },
        map:map
    });
    }
</script>