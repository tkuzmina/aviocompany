<table class="adminTable">

    <div class='Title'><h1>Admin table: cities</h1></div>
<tr><td>Name</td></tr>
    
       <tr>
         <?=form_open('cities/add')?>  
		<td align="left"><?=form_input('name','')?></td>
		<td align="left"><?=form_submit('add_city', 'Add')?></td>
		    <?=form_close();?>
		</tr>


        <table class="Content">
            <?php foreach ($cities as $city): ?>

            <?=form_open('cities/edit')?>
            <?=form_hidden('city_id', $city->id)?>
            <tr>
                <td><?=form_input('name', $city->name)?></td>
                <td align="left">
                    <?=form_submit('edit_plane', 'Edit')?>
                    <a href='<?='cities/delete?city_id='.$city->id?>'>
                    <span class="deleteIcon"><?=img('images/delete_icon.png')?></span></a>
                </td>
            </tr>

            <?=form_close();?>
        <?php endforeach; ?>
        </table>
</table>