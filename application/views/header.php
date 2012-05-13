<!DOCTYPE html>
<html>
<head>

    <link href="/avio/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/avio/css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/avio/css/aviocompany.css" rel="stylesheet" type="text/css"/>
    <link href="/avio/css/jquery.ui.timepicker.css" rel="stylesheet" type="text/css"/>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet"
          type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script src="/avio/js/aviocompany.js"></script>
    <script src="/avio/js/bootstrap.js"></script>
    <script src="/avio/js/jquery.ui.timepicker.js"></script>

    <script>
        $(function() {
            $("input.datepicker").datepicker({ dateFormat: "yy-mm-dd" });
            $("input.timepicker").timepicker();

            $(".edit_data").hide();
            $(".edit_button").on('click', function() {
                $(".edit_data").hide();
                $(".view_data").show();
                var id = $(this).attr('id').replace("edit_", "");
                $(".view_" + id).hide();
                $(".edit_" + id).show();
            });
            $(".cancel_button").on('click', function() {
                $(".view_data").show();
                $(".edit_data").hide();
            });
        });
    </script>

</head>
<body>

    <?php $current_user = $this->session->userdata('current_user') ?>

	<div id="container">
	    <div class="header">
	        <div class="logo"><img src="/avio/img/logo.png" alt="LIDOTLETI.LV - Cheap airpline tickets, hotels, travels" title="Cheap flights - Lidot Leti" /></div>
	        <div class="phone">Phone:<span class="number"> &nbsp;(+371) 645 67 349</span></div>
		</div>
        <?php if ($current_user): ?>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="main">Main</a>
                    <ul class="nav">
                        <li><a href="news">News</a></li>
                        <li><a href="flights">Flights</a></li>
                        <li><a href="planes">Planes</a></li>
                        <li><a href="cities">Cities</a></li>
                        <li><a href="users">Users</a></li>
                    </ul>
                    <ul class="nav pull-right">
                        <li><a href="#">Welcome, <?=$current_user->name?> <?=$current_user->surname?></a></li>
                        <li><a href="users/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
	<div class="main">

        <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-error"><?= $this->session->flashdata('message') ?></div>
        <?php endif; ?>

