<table class="adminTable">

    <div class='Title'><h1>Planes</h1></div>

    <?=form_open('planes/add')?>
        <table class="Content">
            <tr><td width='100px'>Model:</td><td><?=form_input('model', '')?></td></tr>
            <tr><td>Seats ecoonomy:</td><td><?=form_input('seats_economy', '')?></td></tr>
            <tr><td>Seats business:</td><td><?=form_input('seats_business', '')?></td></tr>
            <tr><td>Luggage count:</td><td><?=form_input('luggage_count', '')?></td></tr>
        </table>
		<td align="left"><?=form_submit('add_plane','Add')?></td>
    <?=form_close();?>


        <table class="Content">
           <tr><td>Model</td><td>Seats economy</td><td>Seats business </td> <td>Luggage count</td></tr>
            <?php foreach ($planes as $plane): ?>

            <?=form_open('planes/edit')?>
            <?=form_hidden('plane_id', $plane->id)?>
            <tr>
                <td><?=form_input('model', $plane->model)?></td>
                <td><?=form_input('seats_economy', $plane->seats_economy)?></td>
                <td><?=form_input('seats_business', $plane->seats_business)?></td>
                <td><?=form_input('luggage_count', $plane->luggage_count)?></td>
                <td align="left">
                    <?=form_submit('edit_plane', 'Edit')?>
                    <a href='<?='planes/delete?plane_id='.$plane->id?>'>
                    <span class="deleteIcon"><?=img('images/delete_icon.png')?></span></a>
                </td>
            </tr>

            <?=form_close();?>
        <?php endforeach; ?>
        </table>



</table>