<!DOCTYPE html>
<html>
<head>

    <?=header('Content-Type: text/html; charset=utf-8');?>
    <?=header('Cache-Control: no-cache, must-revalidate');?>
    <?=header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');?>

    <link href='<?=avio_resource_url("css/bootstrap.css")?>' rel="stylesheet" type="text/css"/>
    <link href='<?=avio_resource_url("css/bootstrap-responsive.css")?>' type="text/css"/>
    <link href='<?=avio_resource_url("css/aviocompany.css")?>' rel="stylesheet" type="text/css"/>
    <link href='<?=avio_resource_url("css/jquery.ui.timepicker.css")?>' rel="stylesheet" type="text/css"/>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css" rel="stylesheet"
          type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script src='<?=avio_resource_url("js/aviocompany.js")?>'></script>
    <script src='<?=avio_resource_url("js/bootstrap.js")?>'></script>
    <script src='<?=avio_resource_url("js/jquery.ui.timepicker.js")?>'></script>

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
            $("a.switch_language").on('click', function() {
                var lang = $(this).attr('id');
                window.location.href = '<?=avio_url("languages/set_language?language=")?>' + lang;
            });
        });
    </script>

</head>
<body>

    <?php $current_user = $this->session->userdata('current_user') ?>

	<div id="container">
	    <div class="header">
	        <a class="logo" href='<?=avio_url("main")?>'>
			<img src='<?=avio_resource_url("img/avio.png")?>' alt="" title="" />
			<img class="img" src='<?=avio_resource_url("img/avio_lv.png")?>' alt="" title="" />
			</a>
	        <div class="phone"><?=$this->lang->line('ui_phone')?>:<span class="number"> &nbsp;(+371) 645 67 349</span></div>

		</div>

        <div class="languages">
            <a class="switch_language" id="en"><img class="switch_language" src='<?=avio_resource_url("img/flag_en.gif")?>' alt="en"/></a>
            <a class="switch_language" id="lv"><img class="switch_language" src='<?=avio_resource_url("img/flag_lv.gif")?>' alt="lv"/></a>
            <a class="switch_language" id="ru"><img class="switch_language" src='<?=avio_resource_url("img/flag_ru.gif")?>' alt="ru"/></a>
        </div>

        <?php if ($current_user): ?>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li class="menuItem" id="news"><a href='<?=avio_url("news")?>'><?=$this->lang->line('ui_news')?></a></li>
                        <li class="menuItem" id="questions"><a href='<?=avio_url("questions")?>'><?=$this->lang->line('ui_questions')?></a></li>
                        <li class="menuItem" id="flights" ><a href='<?=avio_url("flights")?>'"><?=$this->lang->line('ui_flights')?></a></li>
                        <li class="menuItem" id="planes"><a href='<?=avio_url("planes")?>'"><?=$this->lang->line('ui_planes')?></a></li>
                        <li class="menuItem" id="cities"><a href='<?=avio_url("cities")?>'"><?=$this->lang->line('ui_cities')?></a></li>
                        <?php if ($current_user->role_id == 2): ?>
                        <li class="menuItem" id="users"><a href='<?=avio_url("users")?>'"><?=$this->lang->line('ui_users')?></a></li>
                        <?php endif; ?>
                    </ul>
                    <ul class="nav pull-right">
                        <li><a href="#"><?=$this->lang->line('ui_welcome')?>, <?=$current_user->name?> <?=$current_user->surname?></a></li>
						<li class="divider-vertical"></li>
                        <li><a class="logout" href='<?=avio_url("users/logout")?>'><?=$this->lang->line('ui_logout')?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
	<div class="main">

        <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-error"><?= $this->session->flashdata('message') ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('info')): ?>
            <div class="alert alert-info"><?= $this->session->flashdata('info') ?></div>
        <?php endif; ?>

