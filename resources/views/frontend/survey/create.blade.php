<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body style="text-align: center">
    <div class="title">
        {{$category->name}}
    </div>
    @include("errors")
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
            <input type="file" name="files[]" accept="video/*, image/*" id="files" value="{{old("files")}}" multiple hidden>
            <label for="files">Добавить фото или видео</label>
            <div class="selected-media">

            </div>
            <div class="rank_inputs">
                <p>Настроение</p>
                <input type="radio" class="mood-radio" id="mood_1" name="mood" value="1"  > <label class="mood_items" for="mood_1">1</label>
                <input type="radio" class="mood-radio" id="mood_2" name="mood" value="2"  > <label class="mood_items" for="mood_2">2</label>
                <input type="radio" class="mood-radio" id="mood_3" name="mood" value="3"  > <label class="mood_items" for="mood_3">3</label>
                <input type="radio" class="mood-radio" id="mood_4" name="mood" value="4"  > <label class="mood_items" for="mood_4">4</label>
                <input type="radio" class="mood-radio" id="mood_5" name="mood" value="5"  > <label class="mood_items" for="mood_5">5</label>
            </div>
            <input type="submit" value="Отправить">
        </form>
    </body>
</html>
