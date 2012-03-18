<?php include("header.php"); ?>

<table class="adminTable">

<tr align="center">
    <td><?=$this->lang->line('ui_category_name_label')?></td>
    <td><?=$this->lang->line('ui_actions_label')?></td>
</tr>

<tr>
    <?=form_open(flights_url('planes/add/'))?>
    <td><?=form_input('model','')?></td>
	<td><?=form_input('seats_economy','')?></td>
	<td><?=form_input('seats_business','')?></td>
	<td><?=form_input('luggage_count','')?></td>
    <td align="left"><?=form_submit('add_plane', $this->lang->line('ui_add_button'))?></td>
    <?=form_close();?>
</tr>

<?php foreach ($planes as $plane): ?>
<tr>
    <?=form_open(flights_url('planes/edit/'))?>
    <?=form_hidden('plane_id', $plane->id)?>
    <td>
        <?=form_input('model', $plane->model)?>
		<?=form_input('seats_economy', $plane->seats_economy)?>
		<?=form_input('seats_business', $plane->seats_business)?>
		<?=form_input('luggage_count', $plane->luggage_count)?>
    </td>
    <td align="left">
        <?=form_submit('edit_plane', $this->lang->line('ui_edit_button'))?>
        <a href='<?=flights_url('planes/delete?plane_id=').$plane->id?>'>
        <span class="deleteIcon"><?=img('images/delete_icon.png')?></span></a>
    </td>
    <?=form_close();?>
</tr>
<?php endforeach; ?>
</table>

<?php include("footer.php"); ?>