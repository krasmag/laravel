@extends('layout')

@section('content')
    @if($users)
    <h1>{{$com}}</h1>
    <table class="table">
        <thead>
          <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        @if($user->company === $com)
                        <?
                        $a = $user->adress;
                        $b = $user->adress2;
                        ?>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div><!-- ./table-responsive-->

        <div
        class='hidden'
        data-name='{{$com}}'
        data-lat='{{$a}}'
        data-lng='{{$b}}'
        {{-- data-sotr='{{$array}}' доделать
        --}}
      ></div>
    @else
        <p>Записей не найдено...</p>
    @endif
	<div id="map-test" class="map"></div>
	<script src="https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU"></script>
    <script>
        let a = $('div.hidden').data('lat');
        let b = $('div.hidden').data('lng');
        let c = $('div.hidden').data('name');
    let center = [a,b];

        function init() {
            let map = new ymaps.Map('map-test', {
                center: center,
                zoom: 10
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
                        <div class="balloon__address">${c}</div>
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
    <form method="get" action="{{ route('redact') }}">
    <input type="hidden" value="{{$com}}" id="r" name="r"><button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
@endsection

