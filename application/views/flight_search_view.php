<?php include("header.php"); ?>

<h1>Airtickets search and reservation</h1>
<?=form_open('flight_search/search_by_params', array("class" => "form-horizontal"))?>
<table class="searchTable">
    <tr class="searchLabelRow">
        <td colspan="3"><strong>City from:</strong></td>
        <td><strong>Date from:</strong></td>
    </tr>
    <tr>
        <td colspan="3"><?=form_dropdown('city_from_id', $city_list, $city_from_id, "class='span3'")?></td>
        <td><?=form_input(array('name' => 'date_from', 'value' => $date_from, 'class' => 'span2 datepicker'))?></td>
    </tr>
    <tr class="searchLabelRow">
        <td colspan="3"><strong>City to:</strong></td>
        <td><strong>Date to:</strong></td>
    </tr>
    <tr>
        <td colspan="3"><?=form_dropdown('city_to_id', $city_list, $city_to_id, "class='span3'")?></td>
        <td><?=form_input(array('name' => 'date_to', 'value' => $date_to, 'class' => 'span2 datepicker'))?></td>
    </tr>
    <tr class="searchLabelRow">
        <td><strong>Adults:</strong></td>
        <td><strong>Children:</strong></td>
        <td><strong>Infants:</strong></td>
        <td><strong>Class:</strong></td>
    </tr>
    <tr>
        <td><?=form_dropdown('adult_count', $count_list, $adult_count, "class='span1'")?></td>
        <td><?=form_dropdown('child_count', $count_list, $child_count, "class='span1'")?></td>
        <td><?=form_dropdown('infant_count', $count_list, $infant_count, "class='span1'")?></td>
        <td><?=form_dropdown('class_id', $classes_list, $class_id, "class='fill'")?></td>
    </tr>
    <tr class="searchLabelRow">
        <td colspan="4"><?=form_submit('search_flight', 'Search', "class='btn btn-primary pull-right'")?></td>
    </tr>
</table>

<?=form_close();?>

<h1>Results:</h1>
<table class='table table-bordered'>

    <thead>
    <tr>
        <th rowspan="3">City from</th>
        <th rowspan="3">City to</th>
        <th rowspan="3">Datetime from</th>
        <th rowspan="3">Datetime to</th>
        <th rowspan="3">Plane model</th>
        <th colspan="6">Prices</th>
        <th rowspan="3"></th>
    </tr>
    <tr>
        <th colspan="3">Economy</th>
        <th colspan="3">Business</th>
    </tr>
    <tr>
        <th>Adult</th>
        <th>Child</th>
        <th>Infant</th>
        <th>Adult</th>
        <th>Child</th>
        <th>Infant</th>
    </tr>
    </thead>
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
   		<td><a class='btn btn-primary' href=<?= "tickets/buy?flight_id=".$flight->id?>>Buy</a></td>
    </tr>
<?php endforeach ?>
</table>


<?php include("footer.php"); ?>