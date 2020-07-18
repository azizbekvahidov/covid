<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div {
            display: flex;
            justify-content: space-around;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }
        div:first-child {
            margin-bottom: 20px;
            border: 1px solid #333;
        }
        span {
            width: 50%;
            border-left: 1px solid #333;
            border-right: 1px solid #333;
        }
    </style>
</head>
<body>
    <div>
        <span>Заголовок</span>
    </div>

        @foreach($categories as $category)
            <div>
            <span>{{$category->name}}</span>
            </div>
        @endforeach

</body>
</html>
