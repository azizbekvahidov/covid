<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            margin-top: 25px;
        }
        div {
            display: flex;
            justify-content: space-around;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }
        div:first-child span {
            border: 1px solid #333;
        }
        span {
            width: 25%;
            border-left: 1px solid #333;
            border-right: 1px solid #333;
            font-size: 12px;
        }
        input,
        a {
            border: none;
            font-family: 'Nunito', sans-serif;
            font-size: 12px;
            text-decoration: none;
            background-color: inherit;
            color: #0af;
            font-weight: 700;
            cursor: pointer;
            transition: color 0.1s linear;
        }
        input:hover,
        a:hover {
            color: #0a3a61;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include("message")
    <a href="/survey/category">Добавить</a>
    <div>
        <span>Категория</span>
        <span>Оценка</span>
        <span>Мнение или жалоба</span>
        <span>Оценка настроения</span>

    </div>
    <br>
    @foreach($surveys as $survey)
        <div>
            <span><a href="/survey/{{$survey->id}}">{{$survey->category->name}}</a></span>
            <span>{{$survey->rank}}</span>
            <span>{{$survey->opinion}}</span>
            <span>{{$survey->mood_rank}}</span>
        </div>
    @endforeach
</body>
</html>
