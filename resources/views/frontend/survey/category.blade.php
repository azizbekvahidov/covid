<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .main_block {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }
        .title {
            text-transform: uppercase;
            margin-top: 20px;
            font-weight: 700;
            font-size: 28px;
            font-family: 'Nunito', sans-serif;
        }
        .category {
            margin: 20px auto;
            width: 60%;
            padding: 5px 20px;
            background-color: #333;
        }
        .category a {
            color: #ccc;
            text-decoration: none;
            font-size: 20px;
        }
        .category a:active {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="main_block">
        <div class="title">
            Выберите категорию
        </div>
        @include("message")
    @foreach($categories as $category)
@php
<<<<<<< HEAD
    $date = array();
        $survey = \App\Survey::where("user_id", "1")->where("category_id", $category->id)->orderBy("id", "desc")->first();
        if(!empty($survey))
            $date = new DateTime(date($survey->created_at));
@endphp

    <div class="category">
            <a href="/survey/{{$category->id}}/create" class="link" time="{{(!empty($date)) ? $date->getTimestamp() : ""}}">{{$category->name}}</a>
=======
    $survey = \App\Survey::where("user_id", "1")->where("category_id", $category->id)->orderBy("id", "desc")->first();
    if (!is_null($survey)) {
    $date = strtotime(date($survey->created_at));
@endphp

    <div class="category">
            <a href="/survey/{{$category->id}}/create" class="link" time="{{$date}}">{{$category->name}}</a>
>>>>>>> remotes/origin/firdavs
    </div>
@php
    }
    else {
@endphp
            <div class="category">
                <a href="/survey/{{$category->id}}/create" class="link" time="">{{$category->name}}</a>
            </div>
<?php } ?>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).on("click", ".link", function (e) {
            let now = Math.floor(new Date()/1000),
                time = $(this).attr("time");
            if (now - time < 43200) {
                e.preventDefault();
                // let block = "<span>"  "</span>";

            }
        });
    </script>
</body>
</html>
