<?php include("header.php"); ?>

<h1><?=$this->lang->line('ui_airtickets_search_and_resevation')?></h1>

<?php include("search_view.php"); ?>

<table class="fill">
<tr>
    <td><h1><?=$this->lang->line('ui_flights_to')?>:</h1></td>
    <?php if ($date_return): ?><td><h1><?=$this->lang->line('ui_return_flights')?>:</h1></td><?php endif; ?>
</tr>
<tr>
    <td>
        <?php if ($flights_to): ?>
        <table class='table table-bordered search_flight'>
            <thead>
            <tr>
                <th></th>
                <th><?=$this->lang->line('ui_city_from')?></th>
                <th><?=$this->lang->line('ui_city_to')?></th>
                <th><?=$this->lang->line('ui_date')?></th>
				<th><?=$this->lang->line('ui_time_of_departure')?></th>
                <th><?=$this->lang->line('ui_plane_model')?></th>
                <th><?=$this->lang->line('ui_price')?></th>
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
            <h2><?=$this->lang->line('ui_no_flights_found')?>.</h2>
        <?php endif; ?>
    </td>
    <td>
    <?php if ($date_return): ?>
    <?php if ($flights_return): ?>
        <table class='table table-bordered search_flight'>
            <thead>
            <tr>
                <th></th>
                <th><?=$this->lang->line('ui_city_from')?></th>
                <th><?=$this->lang->line('ui_city_to')?></th>
                <th><?=$this->lang->line('ui_date')?></th>
				<th><?=$this->lang->line('ui_time_of_departure')?></th>
                <th><?=$this->lang->line('ui_plane_model')?></th>
                <th><?=$this->lang->line('ui_price')?></th>
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
        <h2><?=$this->lang->line('ui_no_flights_found')?>.</h2>
    <?php endif; ?>
    </td>
    <?php endif; ?>
</tr>
</table>

<?php if ($flights_to && (!$date_return || $flights_return)): ?>
<button id="buy" class="btn btn-primary"><th><?=$this->lang->line('ui_choose')?></th></button>
<?php endif; ?>

<script>
    $(function() {
        $('button#buy').on('click', function() {
            var flight_to = $("#flight_to:checked");
            var flight_return = $("#flight_return:checked");
            var url = '<?=avio_url("tickets/buy?flight_to_id=")?>' + flight_to.val();
            if (flight_return && flight_return.val()) {
                url += "&flight_return_id=" + flight_return.val();
            }
            window.location.href = url;
        });
    });
</script>

<?php include("footer.php"); ?>