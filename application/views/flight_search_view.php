<h1>Flight search</h1>
<div id="table">
    <?=form_open('flight_search/search_by_params')?>
    <?=form_dropdown('city_from_id', $city_list, $city_from_id)?>
    <?=form_dropdown('city_to_id', $city_list, $city_to_id)?>
    <?=form_submit('add_flight', 'Search')?>
    <?=form_close();?>
</div>

<h1>Results:</h1>

<table>
<?php foreach ($flights as $flight): ?>
    <tr>
        <td><?= $flight->id ?></td>
        <td><?= $flight->city_from_name ?></td>
        <td><?= $flight->city_to_name ?></td>
        <td><?= $flight->plane_model ?></td>
    </tr>
<?php endforeach ?>
</table>