<?php include("header.php"); ?>
<table class="table table-bordered">
<thead>
<h1><?=$this->lang->line('ui_flight_reservations')?>:</h1>

<table class='table table-bordered'>
    <thead>
    <tr>
        <th><?=$this->lang->line('ui_city_from')?></th>
        <th><?=$this->lang->line('ui_city_to')?></th>
        <th><?=$this->lang->line('ui_date')?></th>
        <th><?=$this->lang->line('ui_time_of_departure')?></th>
        <th><?=$this->lang->line('ui_plane_model')?></th>
        <th><?=$this->lang->line('ui_seats_free')?> (E)</th>
        <th><?=$this->lang->line('ui_seats_free')?>(B)</th>
    </tr>
    </thead>
    <tr>
        <td><?= $flight->city_from_name ?></td>
        <td><?= $flight->city_to_name ?></td>
        <td><?= $flight->date_from ?></td>
        <td><?= $flight->time_from ?></td>
        <td><?= $flight->plane_model ?></td>
        <td><?= $flight->free_economy ?> / <?= $flight->seats_economy ?></td>
        <td><?= $flight->free_business ?> / <?= $flight->seats_business ?></td>
    </tr>
</table>

<?php foreach ($tickets as $ticket): ?>
<h3>
    <?=$this->lang->line('ui_reservation')?> ID: <?=$ticket->id?>
    <span class="pull-right"><?= $ticket->class_id == 1 ? $this->lang->line('ui_economy_class') : $this->lang->line('ui_business_class') ?></span>
</h3>
<table class="table table-bordered">
<thead>
<tr>
  <th><?=$this->lang->line('ui_person_name')?></th>
  <th><?=$this->lang->line('ui_person_surname')?></th>
  <th><?=$this->lang->line('ui_luggage_count')?></th>
  <th><?=$this->lang->line('ui_passport_number')?></th>
  <th><?=$this->lang->line('ui_date_of issue')?></th>
  <th><?=$this->lang->line('ui_date_of_expiration')?></th>
</tr>
</thead>
<?php foreach ($ticket_passengers[$ticket->id] as $passenger): ?>
<tr>
    <td><?= $passenger->name ?></td>
    <td><?= $passenger->surname ?></td>
    <td><?= $passenger->luggage_count ?></td>
    <td><?= $passenger->passport_number ?></td>
	<td><?= $passenger->issue_date ?></td>
	<td><?= $passenger->expiration_date ?></td>
</tr>
<?php endforeach ?>
</table>
<?php endforeach ?>

<?php include("footer.php"); ?>
