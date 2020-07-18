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
    <div>
        <h1>{{$survey->category->name}}</h1>
        <p>{{$survey->opinion}} ))</p>
        @foreach($survey->files as $file)
            @if(str_contains($file->path, "images"))
                <img src="{{$file->path}}/{{$file->name}}" width="500px" alt="">
            @else
                <video src="{{$file->path}}/{{$file->name}}" controls="controls" width="500px" height="400px"></video>
            @endif
        @endforeach
    </div>
</body>
</html>
