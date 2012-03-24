<div id="Add_Flight">

    <?=form_open('flights/add')?>
    <?=form_hidden('plane_id', $plane->id)?>  
	<table class="AddingFlight">
    <tr><td>Planes model</tr></td>
	<?=form_dropdown('plane_id', $planes, $planes->model)?>
    <?=form_close();?>
	</table>
</div>
