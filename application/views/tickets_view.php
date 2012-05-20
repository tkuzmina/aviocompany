<?php include("header.php"); ?>
<table class="table table-bordered">
<thead>
<h1>Flight reservations:</h1>

<table class='table table-bordered'>
    <thead>
    <tr>
        <th>City from</th>
        <th>City to</th>
        <th>Date</th>
        <th>Time of departure</th>
        <th>Plane model</th>
        <th>Seats free (E)</th>
        <th>Seats free (B)</th>
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
    Reservation ID: <?=$ticket->id?>
    <span class="pull-right"><?= $ticket->class_id == 1 ? "ECONOMY" : "BUSINESS" ?></span>
</h3>
<table class="table table-bordered">
<thead>
<tr>
  <th>Name</th>
  <th>Surname</th>
  <th>Luggage count</th>
  <th>Passport number</th>
  <th>Issue date</th>
  <th>Expiration date</th>
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
