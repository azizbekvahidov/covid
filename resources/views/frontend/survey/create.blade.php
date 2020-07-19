<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            body{
                width: 100%;
                max-width: 400px;
                margin: 0 auto;

            }
            .selected-media {
                align-items: center;
            }

            .preview {
                position: relative;
                width: 150px;
                margin: 0 auto;
            }

            .thumb {
                width: inherit;
            }

            .close_item {
                border: none;
                background-color: #333;
                opacity: .5;
                position: absolute;
                top: 0;
                right: 0;
                cursor: pointer;

                transition: background-color .1s linear;
            }

            .close_item:hover {
                background-color: #666;
            }

            .close_icon {
                color: #fff;
            }

        </style>
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
            <input type="submit" value="Отправить">
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            var j = 1;

            $(document).on("change", ".files", function (evt) {
                j++;
                let input = document.createElement("input");
                input.type      = "file";
                input.name      = "files[]";
                input.accept    = "image/*";
                input.id        = "file_" + j;
                input.className = "files";
                input.hidden    = "hidden";
                $(".file_block").append(input);
                $("#label").attr("for", "file_" + j);

                var file = evt.target.files; // FileList object
                var f = file[0];
                // Only process image files.
                if (!f.type.match('image.*')) {
                    alert("Image only please....");
                }
                var reader = new FileReader();
                // Closure to capture the file information.
                reader.onload = (function(theFile) {
                    return function(e) {
                        // Render thumbnail.
                        var div = document.createElement('div');
                        div.id  = "preview_" + (j-1);
                        div.className  = "preview";
                        div.innerHTML = ['<img class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');

                        var closeButton = document.createElement('button');
                        closeButton.className    = "close_item";
                        closeButton.setAttribute("preview", "file_" + (j-1));
                        closeButton.type         = "button";
                        closeButton.innerHTML = "<span class='close_icon'>&#10005;</span>";
                        document.getElementById('selected-media').insertBefore(div, null);
                        document.getElementById('preview_' + (j-1)).insertBefore(closeButton, null);
                    };
                })(f);
                // Read in the image file as a data URL.
                reader.readAsDataURL(f);
            });

            $(document).on("click", ".close_item", function () {
                let target  = $(this),
                    file_id = target.attr("preview");

                target.parent().detach();
                $("#" + file_id).detach();
                console.log();
            });

        </script>
    </body>
</html>
