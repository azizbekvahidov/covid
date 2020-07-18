<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@include("errors")
<form action="/survey/{{$survey->id}}" method="POST" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <select name="category" id="category">
        <option value="">Выберите категорию</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <textarea name="opinion" id="opinion" cols="30" rows="10" placeholder="Напишите своё мнение">{{$survey->opinion}}</textarea>
    <select name="rank" id="rank">
        <option value="">Оцените категорию</option>
        <option value="1">Ужасно</option>
        <option value="2">Плохо</option>
        <option value="3">Неудовлетворительно</option>
        <option value="4">Удовлетворительно</option>
        <option value="5">Отлично</option>
    </select>
    <select name="mood" id="mood">
        <option value="">Оцените своё настроение</option>
        <option value="1">Сердитое</option>
        <option value="2">Грустное</option>
        <option value="3">Тревожное</option>
        <option value="4">Спокойное</option>
        <option value="5">Радостное</option>
    </select>
    <input type="file" name="files[]" accept="video/*, image/*" value="" multiple>
    <input type="text" name="old_files[]" value="">
    <input type="submit" value="Сохранить">
</form>
</body>
</html>
