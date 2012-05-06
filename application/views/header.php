<!DOCTYPE html>
<html>
<head>

    <link href="/avio/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/avio/css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/avio/css/aviocompany.css" rel="stylesheet" type="text/css"/>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet"
          type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script src="/avio/js/aviocompany.js"></script>
    <script src="/avio/js/bootstrap.js"></script>

    <script>
        $(function() {
            $("input.datepicker").datepicker({ dateFormat: "yy-mm-dd" });
        });
    </script>

</head>
<body>
<div class="container">

    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="flight_search">Main</a>
                <ul class="nav">
                    <li><a href="news">News</a></li>
                    <li><a href="flights">Flights</a></li>
                    <li><a href="planes">Planes</a></li>
                    <li><a href="cities">Cities</a></li>
                </ul>
            </div>
        </div>
    </div>