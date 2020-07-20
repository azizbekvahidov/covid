
    @include("errors")


    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey={{config("map")["map_apikey"]}}" type="text/javascript"></script>
    <script src="{{ asset("js/wavesurfer.js") }}"></script>
        <form action="/survey/store" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="category" value="{{$category->id}}" hidden>
            <div class="rank_inputs">
                <p>Оценка категории</p>
                <input type="radio" class="rank-radio" id="rank_1" name="rank" value="1"  > <label class="rank_items" for="rank_1">1</label>
                <input type="radio" class="rank-radio" id="rank_2" name="rank" value="2"  > <label class="rank_items" for="rank_2">2</label>
                <input type="radio" class="rank-radio" id="rank_3" name="rank" value="3"  > <label class="rank_items" for="rank_3">3</label>
                <input type="radio" class="rank-radio" id="rank_4" name="rank" value="4"  > <label class="rank_items" for="rank_4">4</label>
                <input type="radio" class="rank-radio" id="rank_5" name="rank" value="5"  > <label class="rank_items" for="rank_5">5</label>
            </div>
            <textarea name="opinion" id="opinion" cols="30" rows="10" placeholder="Напишите своё мнение">{{old("opinion")}}</textarea>
            <br>
            <div class="file_block">
                <label for="file_1" id="label">Добавить фото или видео</label>
                <div id="selected-media"></div>
                <input type="file" name="files[]" accept="image/*" id="file_1" class="files" hidden>
            </div>
            <div class="rank_inputs mood">
                <p>Настроение</p>

                @if(time() - $old_mood_mark < 43200)

                    <input type="radio" class="mood-radio" id="mood_1" name="mood" value="1" disabled> <label class="mood_items" for="mood_1">1</label>
                    <input type="radio" class="mood-radio" id="mood_2" name="mood" value="2" disabled> <label class="mood_items" for="mood_2">2</label>
                    <input type="radio" class="mood-radio" id="mood_3" name="mood" value="3" disabled> <label class="mood_items" for="mood_3">3</label>
                    <input type="radio" class="mood-radio" id="mood_4" name="mood" value="4" disabled> <label class="mood_items" for="mood_4">4</label>
                    <input type="radio" class="mood-radio" id="mood_5" name="mood" value="5" disabled> <label class="mood_items" for="mood_5">5</label>
                    <div>Настроение можно указывать каждые 12 часов</div>
                @else
                    <input type="radio" class="mood-radio" id="mood_1" name="mood" value="1"> <label class="mood_items" for="mood_1">1</label>
                    <input type="radio" class="mood-radio" id="mood_2" name="mood" value="2"> <label class="mood_items" for="mood_2">2</label>
                    <input type="radio" class="mood-radio" id="mood_3" name="mood" value="3"> <label class="mood_items" for="mood_3">3</label>
                    <input type="radio" class="mood-radio" id="mood_4" name="mood" value="4"> <label class="mood_items" for="mood_4">4</label>
                    <input type="radio" class="mood-radio" id="mood_5" name="mood" value="5"> <label class="mood_items" for="mood_5">5</label>
                @endif
            </div>
            <div>

                <input type="file" accept="audio/*;capture=microphone" id="audioInput" name="audio" >
                <p><button type="button" id="btnStart" style="width: 50px; height: 50px;">Start</button>
                        <button type="button" id="btnDel">del</button>
                    </p>
                <div id="waveform"></div>

            </div>

            <div id="map" style="height: 300px"></div>
            <input type="submit" value="Отправить">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="{{ asset("js/voice.js") }}"></script>
        <script src="{{ asset('js/map.js') }}" defer></script>
        <script src="{{asset("js/imgSelected.js")}}"></script>
            <script>


                // wavesurfer.on('ready', function () {
                //     wavesurfer.play();
                // });
            </script>
