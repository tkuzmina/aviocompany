<!DOCTYPE html>
<html>
<head>

    <link href="/avio/css/print.css" rel="stylesheet" type="text/css"/>
    <link href="/avio/css/bootstrap.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<?php
    $flights = array($flight_to);
    if ($flight_return) {
        array_push($flights, $flight_return);
    }
?>

<?php foreach ($flights as $flight): ?>
<?php foreach ($passengers as $passenger): ?>


<div class="ticket_container">
<div class="ticket_header">Please present your ticket and passport at airport check-in.</div>
<table>
    <tr class="ticket_label">
        <td>Passenger name</td>
        <td>Passenger surname</td>
        <td>Passport No.</td>
        <td>Flight No.</td>
    </tr>
    <tr class="ticket_data">
        <td><?=$passenger->name?></td>
        <td><?=$passenger->surname?></td>
        <td><?=$passenger->passport_number?></td>
        <td><?=$flight->id?></td>
    </tr>
    <tr class="ticket_label">
        <td>From</td>
        <td>To</td>
        <td>Departure date</td>
        <td>Boarding time</td>
    </tr>
    <tr class="ticket_data">
        <td><?= $flight->city_from_name ?></td>
        <td><?= $flight->city_to_name ?></td>
        <td><?= $flight->date_from ?></td>
        <td><?= $flight->time_from ?></td>
    </tr>
    <tr class="ticket_label">
        <td colspan="4"></td>
    </tr>
</table>
<div class="ticket_footer"><?= $ticket->class_id == 1 ? "ECONOMY" : "BUSINESS" ?> CLASS</div>
</div>

<?php endforeach ?>
<?php endforeach ?>

</body>
</html>
