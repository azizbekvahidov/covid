ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [41.311151, 69.279737],
            zoom: 10,
            controls: ['zoomControl']
        }, {
        });
    myMap.container.getElement().style.height = '300px';


    $(".getCoordinate").click( function () {
        geoFindMe();
    });

    function geoFindMe() {
        function success(position) {

            const latitude  = position.coords.latitude;
            const longitude = position.coords.longitude;
            myMap.panTo([latitude,longitude]);
            getLocation(latitude,longitude);
        }

        function error() {
            console.log('Unable to retrieve your location');
        }

        if(!navigator.geolocation) {
            alert('Geolocation is not supported by your browser');
            null;
        } else {
            console.log('Locating…');
            navigator.geolocation.getCurrentPosition(success, error);
        }

    }

    // $.ajax({
    //     url: "/api/map-marker",
    //     success: function (data) {
    //         for(var i of data){
    //             if(i.coords_lat != "" || i.coords_lat != null) {
    //                 myMap.geoObjects
    //                     .add(new ymaps.Placemark([i.coords_lat, i.coords_lng], {
    //                         balloonContent: i.location_title
    //                     }, {
    //                         preset: 'islands#icon',
    //                         iconColor: '#0095b6'
    //                     }));
    //             }
    //         }
    //     }
    // });

    // myMap.events.add('click', function (e) {
    //     var coords = e.get('coords');
    //     getLocation(coords[0].toPrecision(8),coords[1].toPrecision(8))
    //
    // });
    var geolocationControl = new ymaps.control.GeolocationControl({
        options: {
            noPlacemark: true
        }
    });
    geolocationControl.events.add('locationchange', function (event) {
        var position = event.get('position'),
            // При создании метки можно задать ей любой внешний вид.
            locationPlacemark = new ymaps.Placemark(position);
        myMap.geoObjects.add(locationPlacemark);
        // Установим новый центр карты в текущее местоположение пользователя.
        myMap.panTo(position);
        getLocation(position[0],position[1]);
    });
    myMap.controls.add(geolocationControl);

    function getLocation(lat,long) {
        $.ajax({
            url: "/api/getLocation",
            type: "GET",
            data: "lat="+lat+"&lng="+long,
            success: function (data) {
                $("#selected_place").removeAttr('hidden');
                $("#selected_place input").attr('checked', true);
                $("#selected_place input").val(data.id);
                $("#selected_place strong").text(data.place);
                $("#selected_place p").text(data.region);
                $("#locate option").each(function () {
                    if ($(this).text() == data.place) {
                        $(this).attr("selected", "selected");
                        return;
                    }
                });
                $(".confirm-hospital").removeAttr("hidden")

            }
        });
    }

});





