<?php foreach ($flights as $flight): ?>
<table id="Flight">
<tr>
    <?=form_open('flights/add/')?>
    <td><?=form_dropdown('city_from_id', $city_list)?></td>
    <td><?=form_dropdown('city_to_id', $city_list)?></td>
    <td><?=form_input('date_from', '')?></td>
    <td><?=form_input('time_from', '')?></td>
	<td><?=form_input('time_to', '')?></td>
	<td><?=form_dropdown('plane_id', $plane_list)?></td>
	<td><?=form_input('price_economy', '')?></td>
	<td><?=form_input('price_business', '')?></td>
	<td><?=form_input('price_e_child', '')?></td>
	<td><?=form_input('price_b_child', '')?></td>
	<td><?=form_input('price_e_infant', '')?></td>
	<td><?=form_input('price_b_infant', '')?></td>
	<td align="left"><?=form_submit('add_flight', 'Add')?></td>
    <?=form_close();?>
</tr>

<tr>
    <?=form_open('flights/edit/')?>
    <td><?=form_dropdown('city_from_id', $city_list)?></td>
    <td><?=form_dropdown('city_to_id', $city_list)?></td>
    <td><?=form_input('date_from', '')?></td>
    <td><?=form_input('time_from', '')?></td>
	<td><?=form_input('time_to', '')?></td>
	<td><?=form_dropdown('plane_id', $plane_list)?></td>
	<td><?=form_input('price_economy', '')?></td>
	<td><?=form_input('price_business', '')?></td>
	<td><?=form_input('price_e_child', '')?></td>
	<td><?=form_input('price_b_child', '')?></td>
	<td><?=form_input('price_e_infant', '')?></td>
	<td><?=form_input('price_b_infant', '')?></td>
	<td align="left"><?=form_submit('edit_flight', 'Edit')?></td>
    <?=form_close();?>
</tr>

</table>