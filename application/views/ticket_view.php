<?php include("header.php"); ?>
<div class="alert alert-success"><?=$this->lang->line('ui_thank_you')?>!</div>
<table class="table table-bordered">
<thead>
<h1><?=$this->lang->line('ui_information_about_flight')?></h1>
<h2><?=$this->lang->line('ui_reservation_number')?>: <strong><?=$ticket->id?></strong></h2>

<table class="fill">
<tr>
    <td><h2><?=$this->lang->line('ui_flight_to')?>:</h2></td>
    <?php if ($flight_return): ?><td><h2><?=$this->lang->line('ui_return_flight')?>:</h2></td><?php endif; ?>
</tr>
<tr>
    <td>
        <table class='table table-bordered'>
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
        <table class='table table-bordered'>
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

<table class="table table-bordered">
<thead>
<h2><?=$this->lang->line('ui_information_about_passengers')?>:</h2>
<tr>
  <th><?=$this->lang->line('ui_person_name')?></th>
  <th><?=$this->lang->line('ui_person_surname')?></th>
  <th><?=$this->lang->line('ui_luggage_count')?></th>
  <th><?=$this->lang->line('ui_passport_number')?></th>
  <th><?=$this->lang->line('ui_date_of_issue')?></th>
  <th><?=$this->lang->line('ui_date_of_expiration')?></th>
</tr>
</thead>
<?php foreach ($passengers as $passenger): ?>
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

<button class="btn btn-primary" id="printTickets" value=<?="tickets/print_ticket?ticket_id=".$ticket->id?>><?=$this->lang->line('ui_view_tickets')?></button>
<div class="pull-right"><a class="btn btn-primary pad-right" href='<?=avio_url("main")?>'><?=$this->lang->line('ui_main')?></a></div>
<script>
    $(function() {
        $("#printTickets").on('click', function() {
            var url = $("#printTickets").val();
            window.open(url, "", "");
        });
    });
</script>

<?php include("footer.php"); ?>
