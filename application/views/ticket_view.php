<?php include("header.php"); ?>
<div class="alert alert-success">Thank you for choosing our aviocompany!</div>
<table class="table table-bordered">
<thead>
<h1>Information about flight:</h1>
<h2>Reservation number: <strong><?=$ticket->id?></strong></h2>

<table class="fill">
<tr>
    <td><h2>Flight to:</h2></td>
    <?php if ($flight_return): ?><td><h2>Return flight:</h2></td><?php endif; ?>
</tr>
<tr>
    <td>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>City from</th>
                <th>City to</th>
                <th>Date</th>
				<th>Time of departure</th>
                <th>Plane model</th>
                <th>Price</th>
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
                <th>City from</th>
                <th>City to</th>
                <th>Date</th>
				<th>Time of departure</th>
                <th>Plane model</th>
                <th>Price</th>
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
<h2>Information about passenger(s):</h2>
<tr>
  <th>Name</th>
  <th>Surname</th>
  <th>Luggage count</th>
  <th>Passport number</th>
  <th>Issue date</th>
  <th>Expiration date</th>
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

<button class="btn btn-primary" id="printTickets" value=<?="tickets/print_ticket?ticket_id=".$ticket->id?>>View tickets</button>
<div class="pull-right"><a class="btn btn-primary pad-right" href='<?=avio_url("main")?>'>Go to the main page</a></div>
<script>
    $(function() {
        $("#printTickets").on('click', function() {
            var url = $("#printTickets").val();
            window.open(url, "", "");
        });
    });
</script>

<?php include("footer.php"); ?>
