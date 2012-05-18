<?php include("header.php"); ?>

<h1>Airtickets search and reservation</h1>

<?php include("search_view.php"); ?>

<table class="fill">
<tr>
    <td><h1>Flights to:</h1></td>
    <?php if ($date_return): ?><td><h1>Return flights:</h1></td><?php endif; ?>
</tr>
<tr>
    <td>
        <?php if ($flights_to): ?>
        <table class='table table-bordered search_flight'>
            <thead>
            <tr>
                <th></th>
                <th>City from</th>
                <th>City to</th>
                <th>Date</th>
				<th>Time of departure</th>
                <th>Plane model</th>
                <th>Price</th>
            </tr>
            </thead>
        <?php $checked = true ?>
        <?php foreach ($flights_to as $flight_to): ?>
            <tr>
                <td><input type="radio" name="flight_to" id="flight_to" value='<?= $flight_to->id?>' <?= $checked ? 'checked' : "" ?>></td>
                <td><?= $flight_to->city_from_name ?></td>
                <td><?= $flight_to->city_to_name ?></td>
                <td><?= $flight_to->date_from ?></td>
				<td><?= $flight_to->time_from ?></td>
                <td><?= $flight_to->plane_model ?></td>
                <td><?= $flight_to->price ?></td>
            </tr>
        <?php $checked = false ?>
        <?php endforeach; ?>
        </table>
        <?php else: ?>
            <h2>No flights found for this date.</h2>
        <?php endif; ?>
    </td>
    <td>
    <?php if ($date_return): ?>
    <?php if ($flights_return): ?>
        <table class='table table-bordered search_flight'>
            <thead>
            <tr>
                <th></th>
                <th>City from</th>
                <th>City to</th>
                <th>Date</th>
				<th>Time of departure</th>
                <th>Plane model</th>
                <th>Price</th>
            </tr>
            </thead>
    <?php $checked = true ?>
    <?php foreach ($flights_return as $flight_return): ?>
        <tr>
            <td><input type="radio" name="flight_return" id="flight_return", value='<?= $flight_return->id?>' <?= $checked ? 'checked' : "" ?>></td>
            <td><?= $flight_return->city_from_name ?></td>
            <td><?= $flight_return->city_to_name ?></td>
            <td><?= $flight_return->date_from ?></td>
			<td><?= $flight_to->time_from ?></td>
            <td><?= $flight_return->plane_model ?></td>
            <td><?= $flight_return->price ?></td>
        </tr>
    <?php $checked = false ?>
    <?php endforeach; ?>
        </table>
    <?php else: ?>
        <h2>No flights found for this date.</h2>
    <?php endif; ?>
    </td>
    <?php endif; ?>
</tr>
</table>

<?php if ($flights_to && (!$date_return || $flights_return)): ?>
<button id="buy" class="btn btn-primary">Buy</button>
<?php endif; ?>

<script>
    $(function() {
        $('button#buy').on('click', function() {
            var flight_to = $("#flight_to:checked");
            var flight_return = $("#flight_return:checked");
            var url = "tickets/buy?flight_to_id=" + flight_to.val();
            if (flight_return && flight_return.val()) {
                url += "&flight_return_id=" + flight_return.val();
            }
            window.location.href = url;
        });
    });
</script>

<?php include("footer.php"); ?>