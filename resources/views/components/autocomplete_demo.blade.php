@extends('layout')

@section('style')
    {!! Html::style('assest/css/jquery.easy-autocomplete.css') !!}


@endsection

@section('content')
    <h1>Autocomplete Demo</h1>
    {!! Form::open(['class'=>'form']) !!}

    <input type="text" name="user" id="user" class="easy-autocomplete">
    {!! Form::close() !!}

@endsection

@section('scripts')
    {!! Html::script('assest/js/jquery.easy-autocomplete.js') !!}

    <script>
        var url_inicio="{{Route('inicio')}}";
        $(document).ready(function(){


            var options = {
                url: url_inicio + "/resources/people.json",

                getValue: "name",

                template: {
                    type: "description",
                    fields: {
                        description: "email"
                    }
                },

                list: {
                    match: {
                        enabled: true
                    }
                },

                theme: "bootstrap",

                ajaxSettings: {
                    dataType: "json",
                    method: "GET",
                    data: {
                        dataType: "json"
                    }
                },

                preparePostData: function(data) {
                    data.phrase = $("#user").val();
                    return data;
                },

                requestDelay: 400
            };

            $("#user").easyAutocomplete(options);



        });


    </script>
@endsection