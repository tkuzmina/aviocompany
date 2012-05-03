<?php include("header.php"); ?>

<h1>Flight search</h1>
<div id="table">
    <?=form_open('flight_search/search_by_params')?>
    <?=form_dropdown('city_from_id', $city_list, $city_from_id)?>
    <?=form_dropdown('city_to_id', $city_list, $city_to_id)?>
    <?=form_input(array('class' => 'datepicker', 'name' => 'date_from', 'value' => $date_from))?>
    <?=form_input(array('class' => 'datepicker', 'name' => 'date_to', 'value' => $date_to))?>
    <?=form_submit('add_flight', 'Search')?>
    <?=form_close();?>
</div>

<h1>Results:</h1>

<table>
<?php foreach ($flights as $flight): ?>
    <tr>
        <td><?= $flight->city_from_name ?></td>
        <td><?= $flight->city_to_name ?></td>
        <td><?= $flight->date_from ?></td>
        <td><?= $flight->date_to ?></td>
		<td><?= $flight->plane_model ?></td>
        <td><?= $flight->price_economy ?></td>
		<td><?= $flight->price_business ?></td>
		<td><?= $flight->price_e_child ?></td>
		<td><?= $flight->price_b_child ?></td>
		<td><?= $flight->price_e_infant ?></td>
		<td><?= $flight->price_b_infant ?></td>
    </tr>
<?php endforeach ?>
</table>

<?php include("footer.php"); ?>