@extends('layout')

@section('style')
    {!! Html::style('assest/css/jquery.easy-autocomplete.css') !!}


@endsection

@section('content')
    <h1>Autocomplete Demo</h1>
    {!! Form::open(['class'=>'form']) !!}

    <input type="text" name="user" id="user" class="easy-autocomplete"><br>


    <input type="hidden" name="user_id" id="user_id" >

    <input type="submit" class="btn btn-primary" value="enviar">
    {!! Form::close() !!}

@endsection

@section('scripts')
    {!! Html::script('assest/js/jquery.easy-autocomplete.js') !!}

    <script>
       // var url_inicio="{{Route('inicio')}}";
       var url_inicio="{{Route('autocomplete/users')}}";
       var url_inicio2="{{Route('getUser','ID')}}";


        $(document).ready(function(){


            var options = {
               // url: url_inicio + "/resources/people.json",

                url: url_inicio,

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
                    },
                    onSelectItemEvent: function() {
                        var user = $("#user").getSelectedItemData();

                        //console.log(user);

                        $('#user_id').val(user.id);

                        //$("#index-holder").val(index).trigger("change");
                    },

                    //buscador



                    onClickEvent:function () {

                        var user = $("#user").getSelectedItemData();
                        window.location.href=url_inicio2.replace('ID',user.id);

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



        }).change(function () {
           $('#user_id').val('');

       });


    </script>
@endsection