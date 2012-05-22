<!DOCTYPE html>
<html>
<head>

    <link href='<?=avio_resource_url("css/print.css")?>' rel="stylesheet" type="text/css" />
    <link href='<?=avio_resource_url("css/print.css")?>' rel="stylesheet" type="text/css"/>

</head>
<body>
<div class="print">
<div class="all_tickets">
<?php
    $flights = array($flight_to);
    if ($flight_return) {
        array_push($flights, $flight_return);
    }
?>

<?php foreach ($flights as $flight): ?>
<?php foreach ($passengers as $passenger): ?>


<div class="ticket_container">
<div class="ticket_header"><?=$this->lang->line('ui_please_present_your_ticket')?>.</div>
<table>
    <tr class="ticket_label">
        <td><?=$this->lang->line('ui_passenger_name')?></td>
        <td><?=$this->lang->line('ui_passenger_surname')?></td>
        <td><?=$this->lang->line('ui_passport_no')?></td>
        <td><?=$this->lang->line('ui_flight_no')?></td>
    </tr>
    <tr class="ticket_data">
        <td><?=$passenger->name?></td>
        <td><?=$passenger->surname?></td>
        <td><?=$passenger->passport_number?></td>
        <td><?=$flight->id?></td>
    </tr>
    <tr class="ticket_label">
        <td><?=$this->lang->line('ui_city_from')?></td>
        <td><?=$this->lang->line('ui_city_to')?></td>
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
<div class="ticket_footer"><?= $ticket->class_id == 1 ? $this->lang->line('ui_economy_class') : $this->lang->line('ui_business_class') ?> </div>
</div>

<?php endforeach ?>
<?php endforeach ?>
<form><input type="button" value=" <?=$this->lang->line('ui_print')?> "
onclick="window.print();" /></form>

</div>
</div>
</body>
</html>
