<?php include("header.php"); ?>
<table class="adminTable">

    <div class='Title'><h1>Tickets</h1></div>
	
       <tr>
        <?=form_open('tickets/add')?>
		<td align="left"><?=form_dropdown('flight_id',$flights, array())?></td>
		<td align="left"><?=form_dropdown('class_id',$classes, array())?></td>
		<td align="left"><?=form_submit('add_class', 'Add')?></td>
		    <?=form_close();?>
		</tr>


        <table class="Content">
            <?php foreach ($tickets as $ticket): ?>

            <?=form_open('tickets/edit')?>
            <?=form_hidden('ticket_id', $ticket->id)?>
            <tr>
                <td><?=form_input('flight_id',$flights, $ticket->flight_id)?></td>
				<td><?=form_input('class_id',$classes, $ticket->class_id)?></td>
                <td align="left">
                    <?=form_submit('edit_ticket', 'Edit')?>
                    <a href='<?='tickets/delete?ticket_id='.$ticket->id?>'>
                    <span class="deleteIcon"><?=img('images/delete_icon.png')?></span></a>
                </td>
            </tr>
            <?=form_close();?>
        <?php endforeach; ?>
        </table>
</table>
<?php include("footer.php"); ?>
