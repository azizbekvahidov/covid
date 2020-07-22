@extends("frontend.layout")
@section("title", "")
@section("content")
    <div class="pa-15">
        <div class="category-panel">
            <strong>Хотите сообщить о проблеме? </strong>
            <span>Выберите категорию</span>
            @include("message")
            @foreach($categories as $category)

                @php

                    $survey = \App\Survey::where("user_id", \Auth::user()->id)->where("category_id", $category->id)->orderBy("id", "desc")->first();
                    if (!is_null($survey)) {
                    $date = strtotime(date($survey->created_at));
                @endphp
            <div class="category-item">
                <a href="{{ route("survey.create",$category->id) }}" class="link" time="{{$date}}">
                    <?=$category->icon ?>
                    <strong>{{__($category->name)}}</strong>
                </a>
            </div>

                @php
                    }
                    else {
                @endphp
                <div class="category-item">
                    <a href="{{ route("survey.create",$category->id) }}" class="link" time="">
                        <?=$category->icon ?>
                        <strong>{{__($category->name)}}</strong>
                    </a>
                </div>
            <?php } ?>
            @endforeach

        </div>
    </div>
@endsection
@section("js")
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
@endsection