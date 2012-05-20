<?php include("header.php"); ?>
<h1>User menu</h1>

<a class="btn btn-primary" data-toggle="modal" href="#newUser" >Add new user</a>

<table class="table table-bordered usersTable">
<h2>Existing users</h2>
<thead>    
<tr>
    <th>Login</th>
    <th>Name</th>
    <th>Surname</th>
    <th>Email</th>
    <th>Role</th>
    <th>Actions</th>
</tr>
</thead>

<?php foreach ($users as $user): ?>
    <?php
        $view_id = "view_".$user->id;
        $edit_id = "edit_".$user->id;
    ?>
    <?=form_open('users/edit/')?>
    <?=form_hidden('user_id', $user->id)?>
    <tr>
        <td>
            <?=$user->login?>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$user->name?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input('name', $user->name,"class='span2'")?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$user->surname?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input('surname', $user->surname,"class='span2'")?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$user->email?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input('email', $user->email,"class='span2'")?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$roles[$user->role_id]?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_dropdown("role_id", $roles, $user->role_id, "class='span2'")?></div>
        </td>
        <td>
            <span class='edit_data <?=$edit_id?>'>
                <?=form_submit('edit_user', 'Save', "class='btn btn-primary'")?>
                <a class="cancel_button"><i class="icon-remove"></i></a>
            </span>
            <span class='view_data <?=$view_id?>'>
                <a class="edit_button" id=<?="'edit_".$user->id."'" ?>><i class="icon-edit" title="edit"></i></a>
                <a href='<?=avio_url('users/delete?user_id='.$user->id)?>'><i class="icon-trash" title="delete"></i></a>
            </span>
        </td>
    </tr>
    <?=form_close();?>
<?php endforeach; ?>
</table>

<div class="modal" id="newUser">
    <div class="modal-header">
        <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h2>Add new user</h2>
    </div>
    <?=form_open('users/add', array("class" => "form-horizontal"))?>
    <div class="modal-body">
        <div class="control-group">
            <label class="control-label" for="login">Login</label>
            <div class="controls">
                <?=form_input('login', '')?>
			</div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <?=form_password('password', '')?>
			</div>
        </div>
        <div class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
                <?=form_input('name', '')?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="surname">Surname</label>
            <div class="controls">
                <?=form_input('surname', '')?>
            </div>
        </div>
		<div class="control-group">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <?=form_input('email', '')?>
		    </div>
        </div>
		<div class="control-group">
            <label class="control-label" for="role_id">Role</label>
            <div class="controls">
                <?=form_dropdown("role_id", $roles, array())?>
			</div>
        </div>
        <div class="modal-footer">
            <a class="btn" id="newUserClose">Close</a>
            <?=form_submit('add_user', 'Save', "class='btn btn-primary'")?>
        </div>
    <?=form_close();?>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var newUser = $("#newUser");
        newUser.modal().modal('hide');
        $("#newUserClose").on('click', function() {
            newUser.modal('hide');
        });
		var menuItems = $(".menuItem");
        if (menuItems) {
        menuItems.removeClass("active");
        $(".menuItem#users").addClass("active");
        }
    })
</script>

<?php include("footer.php"); ?>
