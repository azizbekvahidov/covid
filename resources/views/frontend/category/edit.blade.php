<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        @include("errors")
        <form action="{{route("survey_categories.update", $category->id)}}" method="POST">
            @method("PUT")
            @csrf
            <input type="text" name="name" value="{{$category->name}}"/>
            <input type="submit" value="Изменить">
        </form>
    </body>
</html>
