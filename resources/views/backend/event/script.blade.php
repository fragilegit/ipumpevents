@section('script')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
<script src="{{ asset('/backend/plugins/simple-mde/simplemde.min.js') }}"></script>
<script src="{{ asset('/backend/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyATj3nXIlTh6atBzhuGuCiuM8sPtU5bw&callback=initMap" async defer></script>
<script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
        $('#event_name').on('blur', function(){
            
            var eventName = this.value.toLowerCase().trim(),
                slugInput = $('#slug');
                theSlug = eventName.replace(/&/g,'-and-')
                                   .replace(/[^a-z0-9-]+/g,'-')
                                   .replace(/\-\-+/g,'-')
                                   .replace(/^-+|-+$/g,'-')
                                
                slugInput.val(theSlug);
        });
        CKEDITOR.replace( 'article-ckeditor' );
        var simplemde = new SimpleMDE({ element: $("#excerpt")[0] });
         

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true
        });

        $('#draft-btn').click(function(e){

            e.preventDefault();
            $('#published_at').val("");
            $('#event-form').submit();
        });

    var map;
    var marker;
    function initMap() {
        console.log({{ $event->lat }});
        @if(isset($event->lat) && isset($event->lng) && isset($newstring) != 'show')
            var lat = {{$event->lat}}
            var lng = {{$event->lng}}

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
        @elseif(isset($event->lat) && isset($event->lng) && isset($newstring))
            var lat = {{$event->lat}}
            var lng = {{$event->lng}}

            map = new google.maps.Map(document.getElementById('map-canvas'),{
            center: {lat: lat, lng: lng},
            zoom: 15
            });
            marker = new google.maps.Marker({
                position:{
                    lat: lat,
                    lng: lng
                },
                map:map,
                draggable: true 
            }); 
            
            google.maps.event.addListener(marker, 'position_changed', function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);

                console.log('input from form field: '+$('#lat').val()+" , "+$('#lng').val());
            });
        @else
        
            map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {lat: 10.6918, lng: -61.2225},
            zoom: 9
            });

            marker = new google.maps.Marker({
                position: {
                    lat: 10.668965,
                    lng: -61.5490587
                },
                map: map,
                draggable: true 
            });

            // var searchBox = new google.maps.places.PlacesService(document.getElementById('searchmap'));
            // // google.maps.event.addListener(searchBox, 'places_changed', function(){

            // // });

            google.maps.event.addListener(marker, 'position_changed', function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $('#lat').val(lat);
                $('#lng').val(lng);

                console.log('input from form field: '+$('#lat').val()+" , "+$('#lng').val());
            });
        @endif//end else
        
    }//end function init
    function clearMarkers() {
        setMapOnAll(null);
      }
    </script>
@endsection