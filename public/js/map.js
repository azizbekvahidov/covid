ymaps.ready(function () {
    var places = [];
    $.ajax({
        url: "/api/map-marker",
        success: function (data) {
            places = JSON.parse(data);
        }
    });
    console.log(places);
    var myMap = new ymaps.Map('map', {
            center: [41.317648, 69.247294],
            zoom: 11
        }, {
            searchControlProvider: 'yandex#search',
            // restrictMapArea: [
            //     [41.382318, 69.376188],
            //     [41.218156, 69.389124]
            // ]
        }),

        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        );



    myMap.geoObjects
        .add(new ymaps.Placemark([41.303368, 69.288329], {
            balloonContent: 'цвет <strong>воды пляжа бонди</strong>'
        }, {
            preset: 'islands#icon',
            iconColor: '#0095b6'
        }));

    myMap.events.add('click', function (e) {
        if (!myMap.balloon.isOpen()) {
            var coords = e.get('coords');
            myMap.balloon.open(coords, {
                contentHeader:'Событие!',
                contentBody:'<p>Кто-то щелкнул по карте.</p>' +
                    '<p>Координаты щелчка: ' + [
                        coords[0].toPrecision(6),
                        coords[1].toPrecision(6)
                    ].join(', ') + '</p>',
                contentFooter:'<sup>Щелкните еще раз</sup>'
            });
        }
        else {
            myMap.balloon.close();
        }
    });
});
