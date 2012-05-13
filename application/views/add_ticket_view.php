<?php include("header.php"); ?>

<table class="fill">
<tr>
    <td><h1>Flight to:</h1></td>
    <?php if ($flight_return): ?><td><h1>Return flight:</h1></td><?php endif; ?>
</tr>
<tr>
    <td>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>City from</th>
                <th>City to</th>
                <th>Date</th>
                <th>Plane model</th>
                <th>Price</th>
            </tr>
            </thead>
            <tr>
                <td><?= $flight_to->city_from_name ?></td>
                <td><?= $flight_to->city_to_name ?></td>
                <td><?= $flight_to->date_from ?></td>
                <td><?= $flight_to->plane_model ?></td>
                <td><?= $flight_to->price ?></td>
            </tr>
        </table>
    </td>
    <?php if ($flight_return): ?>
    <td>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>City from</th>
                <th>City to</th>
                <th>Date</th>
                <th>Plane model</th>
                <th>Price</th>
            </tr>
            </thead>
            <tr>
                <td><?= $flight_return->city_from_name ?></td>
                <td><?= $flight_return->city_to_name ?></td>
                <td><?= $flight_return->date_from ?></td>
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
<div class='Title'><h1>Please add information about passengers</h1></div>

<?php $passenger_no = 1 ?>
<?php foreach ($types as $type): ?>

    <?=form_hidden('type_id'.$passenger_no, $type)?>
    <h2>Passenger <?= $passenger_no ?> (<?= $type_list[$type] ?>)</h2>
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

<div class="pull-right">
<a class="btn pad-right" href="/avio/index.php/flight_search">Cancel</a>
<?= form_submit("add", "Buy", "class='btn btn-primary'") ?>
</div>

 <?=form_close();?>

<?php include("footer.php"); ?>
