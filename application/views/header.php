<!DOCTYPE html>
<html>
<head>

    <link href="/aviocompany/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/aviocompany/css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/aviocompany/css/aviocompany.css" rel="stylesheet" type="text/css"/>
    <link href="/aviocompany/css/jquery.ui.timepicker.css" rel="stylesheet" type="text/css"/>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet"
          type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script src="/aviocompany/js/aviocompany.js"></script>
    <script src="/aviocompany/js/bootstrap.js"></script>
    <script src="/aviocompany/js/jquery.ui.timepicker.js"></script>

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
	        <a class="logo" href="/aviocompany/index.php/main">
			<img src="/aviocompany/img/avio.png" alt="" title="" />
			<img class="img" src="/aviocompany/img/avio_lv.png" alt="" title="" />
			</a>
	        <div class="phone">Phone:<span class="number"> &nbsp;(+371) 645 67 349</span></div>
		</div>
        <?php if ($current_user): ?>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand active " href="main">Main</a>
                    <ul class="nav">
                        <li class="menuItem" id="news"><a href="news">News</a></li>
                        <li class="menuItem" id="flights" ><a href="flights">Flights</a></li>
                        <li class="menuItem" id="planes"><a href="planes">Planes</a></li>
                        <li class="menuItem" id="cities"><a href="cities">Cities</a></li>
                        <li class="menuItem" id="users"><a href="users">Users</a></li>
                    </ul>
                    <ul class="nav pull-right">
                        <li><a href="#">Welcome, <?=$current_user->name?> <?=$current_user->surname?></a></li>
						<li class="divider-vertical"></li>
                        <li><a class="logout" href="users/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
	<div class="main">

        <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-error"><?= $this->session->flashdata('message') ?></div>
        <?php endif; ?>

