<?php include("header.php"); ?>
<table class="adminTable">

    <div class='Title'><h1>Please,add information about ticket</h1></div>
	<?=form_open('tickets/adding_passenger')?>
        <table class="registerFormContent">
            <tr><td>Name:</td><td><?=form_input('name', '')?></td></tr>
            <tr><td>Surname:</td><td><?=form_password('surname')?></td></tr>
            <tr><td>Telephone:</td><td><?=form_input('telephone', '')?></td></tr>
			<tr><td>Luggage count:</td><td><?=form_input('luggage_count', '')?></td></tr>
			<tr><td>Passport number:</td><td><?=form_input('passport_int', '')?></td></tr>
			<tr><td>Child:</td><td><?=form_input('child', '')?></td></tr>
            <tr><td></td><td><input class='Button' type='submit' value='Create' /></td></tr>
        </table>
    <?=form_close();?>

</table>
<?php include("footer.php"); ?>
