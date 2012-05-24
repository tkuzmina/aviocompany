<?php include("header.php"); ?>

<?php if (validation_errors()): ?><div class="alert alert-error"><?= validation_errors(); ?></div><?php endif; ?>

<table class="fill">
<tr>
    <td><h1><?=$this->lang->line('ui_flight_to')?>:</h1></td>
    <?php if ($flight_return): ?><td><h1><?=$this->lang->line('ui_return_flight')?>:</h1></td><?php endif; ?>
</tr>
<tr>
    <td>
        <table class='table table-bordered search_flight'>
            <thead>
            <tr>
                <th><?=$this->lang->line('ui_city_from')?></th>
                <th><?=$this->lang->line('ui_city_to')?></th>
                <th><?=$this->lang->line('ui_date')?></th>
				<th><?=$this->lang->line('ui_time_of_departure')?></th>
                <th><?=$this->lang->line('ui_plane_model')?></th>
                <th><?=$this->lang->line('ui_price')?></th>
            </tr>
            </thead>
            <tr>
                <td><?= $flight_to->city_from_name ?></td>
                <td><?= $flight_to->city_to_name ?></td>
                <td><?= $flight_to->date_from ?></td>
				<td><?= $flight_to->time_from ?></td>
                <td><?= $flight_to->plane_model ?></td>
                <td><?= $flight_to->price ?></td>
            </tr>
        </table>
    </td>
    <?php if ($flight_return): ?>
    <td>
        <table class='table table-bordered search_flight'>
            <thead>
            <tr>
                <th><?=$this->lang->line('ui_city_from')?></th>
                <th><?=$this->lang->line('ui_city_to')?></th>
                <th><?=$this->lang->line('ui_date')?></th>
				<th><?=$this->lang->line('ui_time_of_departure')?></th>
                <th><?=$this->lang->line('ui_plane_model')?></th>
                <th><?=$this->lang->line('ui_price')?></th>
            </tr>
            </thead>
            <tr>
                <td><?= $flight_return->city_from_name ?></td>
                <td><?= $flight_return->city_to_name ?></td>
                <td><?= $flight_return->date_from ?></td>
				<td><?= $flight_return->time_from ?></td>
                <td><?= $flight_return->plane_model ?></td>
                <td><?= $flight_return->price ?></td>
            </tr>
        </table>
    </td>
    <?php endif; ?>
</tr>
</table>

<?=form_open('tickets/add')?>
<?=form_hidden('class_id', $class_id)?>
<?=form_hidden('flight_to_id', $flight_to->id)?>
<?=form_hidden('flight_return_id', $flight_return ? $flight_return->id : NULL)?>

<div class='Title'><h1><?=$this->lang->line('ui_please_add_information_about_passengers')?></h1></div>

<?php $passenger_no = 1 ?>
<?php foreach ($types as $type): ?>

    <?=form_hidden('type_id'.$passenger_no, $type)?>
    <h2><?=$this->lang->line('ui_passenger')?> <?= $passenger_no ?> (<?= $type_list[$type] ?>)</h2>
    <table class="registerFormContent">
        <tr>
            <td class="passengerFormLabel"><?=$this->lang->line('ui_person_name')?>:</td><td><?=form_input('name'.$passenger_no, set_value('name'.$passenger_no), validation_class("name".$passenger_no))?></td>
            <td class="passengerFormLabel"><?=$this->lang->line('ui_person_surname')?>:</td><td><?=form_input('surname'.$passenger_no, set_value('surname'.$passenger_no), validation_class("surname".$passenger_no))?></td>
            <td class="passengerFormLabel"><?=$this->lang->line('ui_luggage_count')?>:</td><td><?=form_input('luggage_count'.$passenger_no, set_value('luggage_count'.$passenger_no), validation_class("luggage_count".$passenger_no))?></td>
        </tr>
        <tr>
            <td class="passengerFormLabel"><?=$this->lang->line('ui_passport_number')?>:</td><td><?=form_input('passport_number'.$passenger_no, set_value('passport_number'.$passenger_no), validation_class("passport_number".$passenger_no))?></td>
            <td class="passengerFormLabel"><?=$this->lang->line('ui_date_of_issue')?>:</td><td><?=form_input('issue_date'.$passenger_no, set_value('issue_date'.$passenger_no), validation_class("issue_date".$passenger_no, "datepicker"))?></td>
            <td class="passengerFormLabel"><?=$this->lang->line('ui_date_of_expiration')?>:</td><td><?=form_input('expiration_date'.$passenger_no, set_value('expiration_date'.$passenger_no), validation_class("expiration_date".$passenger_no, "datepicker"))?></td>
        </tr>
    </table>

<?php $passenger_no++ ?>
<?php endforeach ?>
<?=form_hidden('passenger_count', $passenger_no)?>

&nbsp;
<div class='Title'><h1><?=$this->lang->line('ui_payment_details')?></h1></div>

<table class="fill">
    <tr>
        <td><?=$this->lang->line('ui_cardholder_name')?></td>
        <td><?=$this->lang->line('ui_card_number')?></td>
        <td><?=$this->lang->line('ui_card_expiration_date')?></td>
        <td><?=$this->lang->line('ui_card_cvv2')?></td>
    </tr>
    <tr>
        <td><?=form_input('cardholder_name', set_value('cardholder_name'), validation_class("cardholder_name"))?></td>
        <td><?=form_input('card_number', set_value('card_number'), validation_class("card_number"))?></td>
        <td><?=form_input('card_expiration_date', set_value('card_expiration_date'), validation_class("card_expiration_date", "datepicker span1_5"))?></td>
        <td><?=form_input('card_cvv2', set_value('card_cvv2'), validation_class("card_cvv2", "span1_5"))?></td>
    </tr>
</table>

<div class="pull-right">
    <a class="btn pad-right" href='<?=avio_url("flight_search")?>'><?=$this->lang->line('ui_cancel')?></a>
    <?= form_submit("add", $this->lang->line('ui_buy'), "class='btn btn-primary'") ?>
</div>

 <?=form_close();?>

<?php include("footer.php"); ?>
