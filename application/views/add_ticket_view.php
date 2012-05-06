<?php include("header.php"); ?>
<table class="table table-bordered">
<thead>
<tr>
  <th>City from</th>
  <th>City to</th>
  <th>Datetime from</th>
  <th>Datetime to</th>
</tr>
</thead>
<tr>
    <td><?= $flight->city_from_name ?></td>
    <td><?= $flight->city_to_name ?></td>
    <td><?= $flight->date_from ?></td>
    <td><?= $flight->date_to ?></td>
</tr>
</table>

<?=form_open('tickets/add')?>
<?=form_hidden('flight_id', $flight->id)?>
<div class='Title'><h1>Please add information about passengers</h1></div>

<?php $passenger_no = 1 ?>
<?php foreach ($types as $type): ?>

    <?=form_hidden('type_id'.$passenger_no, $type)?>
    <strong>Passenger <?= $passenger_no ?> (<?= $type_list[$type] ?>)</strong>
    <table class="registerFormContent">
        <tr>
            <td class="passengerFormLabel">Name:</td><td><?=form_input('name'.$passenger_no, '')?></td>
            <td class="passengerFormLabel">Surname:</td><td><?=form_input('surname'.$passenger_no, '')?></td>
            <td class="passengerFormLabel">Luggage count:</td><td><?=form_input('luggage_count'.$passenger_no, '')?></td>
        </tr>
        <tr>
            <td class="passengerFormLabel">Passport number:</td><td><?=form_input('passport_number'.$passenger_no, '')?></td>
            <td class="passengerFormLabel">Date of issue:</td><td><?=form_input('issue_date'.$passenger_no, '', "class='datepicker'")?></td>
            <td class="passengerFormLabel">Date of expiration:</td><td><?=form_input('expiration_date'.$passenger_no, '', "class='datepicker'")?></td>
        </tr>
    </table>

<?php $passenger_no++ ?>
<?php endforeach ?>
<?=form_hidden('passenger_count', $passenger_no)?>

<?= form_submit("add", "Buy", "class='btn btn-primary'") ?>

 <?=form_close();?>

<?php include("footer.php"); ?>
