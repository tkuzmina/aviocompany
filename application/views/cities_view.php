<?php include("header.php"); ?>

<h1 class="title">Cities</h1>
<a class="btn btn-primary" data-toggle="modal" href="#newCity" >Add new city</a>
<table class="table table-bordered citiesTable">
<h2>Existing cities</h2>
    <thead>
        <tr>
            <td width='100px'>Name</td>
			<td>Actions</td>
	    </tr>
    </thead>			
 <?php foreach ($cities as $city): ?>
    <?php
        $view_id = "view_".$city->id;
        $edit_id = "edit_".$city->id;
    ?>
    <?=form_open('cities/edit')?>
    <?=form_hidden('city_id', $city->id)?>
    <tr>
        <td>
            <div class='view_data <?=$view_id?>'><?=$city->name?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input('name', $city->name)?></div>
        </td>
        <td>
            <span class='edit_data <?=$edit_id?>'>
                <?=form_submit('edit_city', 'Save', "class='btn btn-primary'")?>
                <a class="cancel_button"><i class="icon-remove"></i></a>
            </span>
            <span class='view_data <?=$view_id?>'>
                <a class="edit_button" id=<?="'edit_".$city->id."'" ?>><i class="icon-edit"></i></a>
                <a href='<?='cities/delete?city_id='.$city->id?>'><i class="icon-trash"></i></a>
            </span>
        </td>
    </tr>
    <?=form_close();?>
    <?php endforeach; ?>
	
</table>

<div class="modal" id="newCity">
    <div class="modal-header">
        <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h3>Add new city</h3>
    </div>
    <?=form_open('cities/add', array("class" => "form-horizontal"))?>
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="name">Name</label>
                <div class="controls">		
                    <?=form_input('name','')?>
			    </div>
			</div>       
            <div class="modal-footer">
                <a class="btn" id="newCityClose">Close</a>
                <?=form_submit('add_city', 'Save', "class='btn btn-primary'")?>
            </div>
    <?=form_close();?>
       </div>
</div>

<script type="text/javascript">
    $(function() {
        var newCity = $("#newCity");
        newCity.modal().modal('hide');
        $("#newCityClose").on('click', function() {
            newCity.modal('hide');
        });
    })
</script>
<?php include("footer.php"); ?>
