<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
	<div id="map-test" class="map"></div>
	<script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU">
	</script>
	{{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <script>let center = [{{$cord1}},{{$cord2}}];

        function init() {
            let map = new ymaps.Map('map-test', {
                center: center,
                zoom: 17
            });

            let placemark = new ymaps.Placemark(center, {
                balloonContentHeader: 'Хедер балуна',
                balloonContentBody: 'Боди балуна',
                balloonContentFooter: 'Подвал',
            }, {
                iconLayout: 'default#image',
                iconImageHref: 'https://image.flaticon.com/icons/png/512/64/64113.png',
                iconImageSize: [40, 40],
                iconImageOffset: [-19, -44]
            });

            let placemark1 = new ymaps.Placemark(center, {
                balloonContent: `
                    <div class="balloon">
                        <div class="balloon__address">{{company}}</div>
                        <div class="balloon__contacts">
                            <a href="tel:+7999999999">+7999999999</a>
                        </div>
                    </div>
                `
            }, {
                iconLayout: 'default#image',
                iconImageHref: 'https://image.flaticon.com/icons/png/512/64/64113.png',
                iconImageSize: [40, 40],
                iconImageOffset: [-19, -44]
            });

            map.controls.remove('geolocationControl'); // удаляем геолокацию
          map.controls.remove('searchControl'); // удаляем поиск
          map.controls.remove('trafficControl'); // удаляем контроль трафика
          map.controls.remove('typeSelector'); // удаляем тип
          map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
          map.controls.remove('zoomControl'); // удаляем контрол зуммирования
          map.controls.remove('rulerControl'); // удаляем контрол правил
            map.geoObjects.add(placemark1);

            placemark1.balloon.open();
        }

        ymaps.ready(init);</script>
</body>
</html>
