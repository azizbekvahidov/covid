ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [41.311151, 69.279737],
            zoom: 10,
            controls: ['zoomControl']
        }, {
            // restrictMapArea: [
            //     [41.382318, 69.376188],
            //     [41.218156, 69.389124]
            // ]
        });
    myMap.container.getElement().style.height = '300px';
console.log(myMap);
        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        )

    /*$("#getMyLocation").click( function () {
        geoFindMe();
    });

    function geoFindMe() {
        function success(position) {

            const latitude  = position.coords.latitude;
            const longitude = position.coords.longitude;
            myMap.panTo([latitude,longitude]);

        }

        function error() {
            console.log('Unable to retrieve your location');
        }

        if(!navigator.geolocation) {
            console.log('Geolocation is not supported by your browser');
            null;
        } else {
            console.log('Locating…');
            navigator.geolocation.getCurrentPosition(success, error);
        }

    }*/

    $.ajax({
        url: "/api/map-marker",
        success: function (data) {
            for(var i of data){
                myMap.geoObjects
                    .add(new ymaps.Placemark([i.coords_lat, i.coords_lng], {
                        balloonContent: i.location_title
                    }, {
                        preset: 'islands#icon',
                        iconColor: '#0095b6'
                    }));
            }
        }
    });



    myMap.events.add('click', function (e) {
        console.log(e);
        if (!myMap.balloon.isOpen()) {
            var coords = e.get('coords');
            getLocation(coords[0].toPrecision(8),coords[1].toPrecision(8))
            // myMap.balloon.open(coords, {
            //     contentHeader:'Событие!',
            //     contentBody:'<p>Кто-то щелкнул по карте.</p>' +
            //         '<p>Координаты щелчка: ' + [
            //             coords[0].toPrecision(6),
            //             coords[1].toPrecision(6)
            //         ].join(', ') + '</p>',
            //     contentFooter:'<sup>Щелкните еще раз</sup>'
            // });
        }
        else {
            myMap.balloon.close();
        }
    });
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

            }
        });
    }

});





