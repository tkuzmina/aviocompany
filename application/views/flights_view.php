<table id="Flight">
<tr>
    <td>City from:</td>
    <td>City to:</td>
    <td>Datetime from:</td>
    <td>Datetime to:</td>
	<td>Plane model:</td>
	<td>Price for economy ticket:</td>
	<td>Price for business ticket:</td>
	<td>Price economy for child:</td>
	<td>Price business for child:</td>
	<td>Price economy for infant:</td>
	<td>Price business for infant:</td>
</tr>

<?=form_open('flights/add')?>
<tr>
    <td><?=form_dropdown('city_from_id', $city_list, array())?></td>
    <td><?=form_dropdown('city_to_id', $city_list, array())?></td>
    <td><?=form_input('datetime_from', '')?></td>
    <td><?=form_input('datetime_to', '')?></td>
	<td><?=form_dropdown('plane_id', $plane_list, array())?></td>
	<td><?=form_input('price_economy', '')?></td>
	<td><?=form_input('price_business', '')?></td>
	<td><?=form_input('price_e_child', '')?></td>
	<td><?=form_input('price_b_child', '')?></td>
	<td><?=form_input('price_e_infant', '')?></td>
	<td><?=form_input('price_b_infant', '')?></td>
	<td align="left"><?=form_submit('add_flight', 'Add')?></td>
</tr>
<?=form_close();?>
 
<?php foreach ($flights as $flight): ?>
<?=form_open('flights/edit')?>
<?=form_hidden('flight_id', $flight->id)?>
<tr>
    <td><?=form_dropdown('city_from_id', $city_list, $flight->city_from_id)?></td>
    <td><?=form_dropdown('city_to_id', $city_list, $flight->city_to_id)?></td>
    <td><?=form_input('datetime_from', $flight->datetime_from)?></td>
    <td><?=form_input('datetime_to', $flight->datetime_to)?></td>
	<td><?=form_dropdown('plane_id', $plane_list, $flight->plane_id)?></td>
	<td><?=form_input('price_economy', $flight->price_economy)?></td>
	<td><?=form_input('price_business', $flight->price_business)?></td>
	<td><?=form_input('price_e_child', $flight->price_e_child)?></td>
	<td><?=form_input('price_b_child', $flight->price_b_child)?></td>
	<td><?=form_input('price_e_infant', $flight->price_e_infant)?></td>
	<td><?=form_input('price_b_infant', $flight->price_b_infant)?></td>
	<td align="left"><?=form_submit('edit_flight', 'Edit')?>
	<a href='<?='flights/delete?flight_id='.$flight->id?>'>
    <span class="deleteIcon"><?=img('images/delete_icon.png')?></span></a></td>
</tr>
<?=form_close();?>
<?php endforeach; ?>
</table>