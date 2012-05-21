<?php include("header.php"); ?>

<h1 class="title"><?=$this->lang->line('ui_planes')?></h1>

<a class="btn btn-primary" data-toggle="modal" href="#newPlane" ><?=$this->lang->line('ui_add_new_plane')?></a>


<table class="table table-bordered flightsTable">
<h2><?=$this->lang->line('ui_existing_planes')?></h2>
    <thead>
        <tr>
            <td><?=$this->lang->line('ui_model')?>:</td>
            <td><?=$this->lang->line('ui_seats_economy')?>:</td>
            <td><?=$this->lang->line('ui_seats_business')?>:</td>
            <td><?=$this->lang->line('ui_luggage_count')?>:</td>
			<td><?=$this->lang->line('ui_actions')?></td>
	    </tr>
    </thead>			
<?php foreach ($planes as $plane): ?>
    <?php
        $view_id = "view_".$plane->id;
        $edit_id = "edit_".$plane->id;
    ?>
    <?=form_open('planes/edit')?>
    <?=form_hidden('plane_id', $plane->id)?>
    <tr>
        <td>
            <div class='view_data <?=$view_id?>'><?=$plane->model?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input('model', $plane->model,"class='span2'")?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$plane->seats_economy?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input('seats_economy', $plane->seats_economy,"class='span2'")?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$plane->seats_business?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input('seats_business', $plane->seats_business,"class='span2'")?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$plane->luggage_count?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input('luggage_count', $plane->luggage_count,"class='span2'")?></div>
        </td>
        <td>
            <span class='edit_data <?=$edit_id?>'>
                <?=form_submit('edit_plane', $this->lang->line('ui_save'), "class='btn btn-primary'")?>
                <a class="cancel_button"><i class="icon-remove"></i></a>
            </span>
            <span class='view_data <?=$view_id?>'>
                <a class="edit_button" id=<?="'edit_".$plane->id."'" ?>><i class="icon-edit" title="edit"></i></a>
                <a href='<?=avio_url('planes/delete?plane_id='.$plane->id)?>'><i class="icon-trash" title="delete"></i></a>
            </span>
        </td>
    </tr>
    <?=form_close();?>
    <?php endforeach; ?>
	
</table>

<div class="modal" id="newPlane">
    <div class="modal-header">
        <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h2><?=$this->lang->line('ui_add_new_plane')?></h2>
    </div>
    <?=form_open('planes/add', array("class" => "form-horizontal"))?>
    <div class="modal-body">
        <div class="control-group">
            <label class="control-label" for="model"><?=$this->lang->line('ui_model')?></label>
            <div class="controls">			
                <?=form_input('model', '')?>
			</div>
        </div>
        <div class="control-group">
            <label class="control-label" for="seats_economy"><?=$this->lang->line('ui_seats_economy')?></label>
            <div class="controls">	
                <?=form_input('seats_economy', '')?>
			</div>
        </div>
		<div class="control-group">
            <label class="control-label" for="seats_business"><?=$this->lang->line('ui_seats_business')?></label>
            <div class="controls">	
                <?=form_input('seats_business', '')?>
		    </div>
        </div>
		<div class="control-group">
            <label class="control-label" for="luggage_count"><?=$this->lang->line('ui_luggage_count')?></label>
            <div class="controls">	
                <?=form_input('luggage_count', '')?>
			</div>
        </div>
        <div class="modal-footer">
            <a class="btn" id="newPlaneClose"><?=$this->lang->line('ui_close')?></a>
            <?=form_submit('add_plane', $this->lang->line('ui_save'), "class='btn btn-primary'")?>
        </div>
    <?=form_close();?>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var newPlane = $("#newPlane");
        newPlane.modal().modal('hide');
        $("#newPlaneClose").on('click', function() {
            newPlane.modal('hide');
        });
		var menuItems = $(".menuItem");
        if (menuItems) {
        menuItems.removeClass("active");
        $(".menuItem#planes").addClass("active");
        }
	});

</script>
</script>
<?php include("footer.php"); ?>