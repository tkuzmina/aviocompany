<table class="adminTable">

    <div class='Title'><h1>Adim table: cities</h1></div>

    <?=form_open('cities/add')?>
        <table class="Content">
            <tr><td width='100px'>Name:</td><td><?=form_input('name', '')?></td></tr>
        </table>
		<td align="left"><?=form_submit('add_city','Add')?></td>
    <?=form_close();?>


        <table class="Content">
           <tr><td>Name</td></tr>
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