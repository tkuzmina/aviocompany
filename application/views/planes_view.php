<table class="adminTable">

    <div class='Title'><h1>Planes</h1></div>
    <?=form_open(flights_url('planes/add/'))?>
        <table class="Content">
            <tr><td width='100px'>Model:</td><td><?=form_input('model', '')?></td></tr>
            <tr><td>Seats ecoonomy:</td><td><?=form_input('seats_economy', '')?></td></tr>
            <tr><td>Seats business:</td><td><?=form_input('seats_business', '')?></td></tr>
            <tr><td>Luggage count:</td><td><?=form_input('luggage_count', '')?></td></tr>
            <tr><td></td><td><input class='Button' type='submit' value='Update' /></td></tr>
        </table>
		<td align="left"><?=form_submit('add_plane',Add)?></td>
    <?=form_close();?>
	
<?php foreach ($planes as $plane): ?>

    <?=form_open(flights_url('planes/edit/'))?>
    <?=form_hidden('plane_id', $plane->id)?>
        <table class="Content">
            <tr><td width='100px'>Model:</td><td><?=form_input('model', '')?></td></tr>
            <tr><td>Seats ecoonomy:</td><td><?=form_input('seats_economy', '')?></td></tr>
            <tr><td>Seats business:</td><td><?=form_input('seats_business', '')?></td></tr>
            <tr><td>Luggage count:</td><td><?=form_input('luggage_count', '')?></td></tr>
            <tr><td></td><td><input class='Button' type='submit' value='Update' /></td></tr>
        </table>
		<td align="left"><?=form_submit('edit_plane',Edit)?></td>
		<a href='<?=flights_url('planes/delete?plane_id=').$plane->id?>'>
        <span class="deleteIcon"><?=img('images/delete_icon.png')?></span></a>
		<?=form_close();?>
<?php endforeach; ?>
</table>