<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <style>
        body{
            margin-top:60px;
        }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    @yield('content')

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

    var url_years = "{{ route('makeyears','ID') }}";

    var url_model = "{{ route('models','ID') }}";

    /*
    $(document).ready(function () {
        $('#search select').select2({
            allowClear: true,
            placeholder: {
                id: "",
                text: 'Select value'
            }
        });

        /*
        $('#search select').change(function () {

            //va a enviar los datos al navegador
            $('#search').submit();
        })

        */

        //funcion popularselect, para carar los combos

        /*)

        $.fn.popularSelect=function (values) {
            var option ='';

            //recoro los valores, 1º el valor a recorrer, y en e segunda la funcion que se ejecuta al recorrer cada argumento

            $.each(values,function (key,row) {
                options+='<option value="' + row.value + '">' + row.text + '</option>';


            });
            $(this).html(options); //asignamos la opcion a html

        }


        $.fn.populateSelect = function (values) {
            var options = '';
            $.each(values, function (key, row) {
                options += '<option value="' + row.value + '">' + row.text + '</option>';
            });
            $(this).html(options);
        }

        //cuando selecciono uno

        $('#make_id').change(function () {

            //lo vacio
            $('#model_id').empty().change();

            //guardo la amrca seleccionada

            var make_id = $(this).val();

            //si esta vacio, lo vacio al otro

            if (make_id == '') {
                $('#makeyear_id').empty().change();
            } else {

                //utilizo ajax, 1ª lo mando a la ruta que hice, 2ª paso la data, 3ª funcion anonima q se ejecuta al recibir los datos
                //getjason pq recibo datos json
                $.getJSON('/makeyears/'+make_id, null, function (values) {
                    $('#makeyear_id').populateSelect(values);
                });
            }
        });

        $('#makeyear_id').change(function () {
            var year = $(this).val();

            if (year == '') {
                $('#model_id').empty().change();
            } else {
                $.getJSON('/models/'+year, null, function (values) {
                    $('#model_id').populateSelect(values);
                });
            }
        });

    });
    */


    $(document).ready(function () {
        $('#search select').select2({
            allowClear: true,
            placeholder: {
                id: "",
                text: 'Select value'
            }
        });

        $.fn.populateSelect = function (values) {
            var options = '';
            $.each(values, function (key, row) {
                options += '<option value="' + row.value + '">' + row.text + '</option>';
            });
            $(this).html(options);
        }

        $('#make_id').change(function () {
            $('#model_id').empty().change();

            var make_id = $(this).val();

            if (make_id == '') {
                $('#makeyear_id').empty().change();
            } else {
                var url = url_years.replace('ID',make_id);
                $.getJSON(url, null, function (values) {
                    $('#makeyear_id').populateSelect(values);
                });
            }
        });

        $('#makeyear_id').change(function () {
            var year = $(this).val();

            if (year == '') {
                $('#model_id').empty().change();
            } else {

                var url = url_model.replace('ID',year);
                $.getJSON(url, null, function (values) {
                    $('#model_id').populateSelect(values);
                });
            }
        });

    });
@yield('s')
</script>
</body>
</html>
