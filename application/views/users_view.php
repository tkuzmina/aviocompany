<h1>User menu</h1>

<table class="adminTable">

<tr align="center" bgcolor="lightgray">
    <td>Login</td>
    <td>Password</td>
    <td>Email</td>
    <td>Role</td>
    <td>Actions</td>
</tr>
<tr>
    <?=form_open('users/add/')?>
    <td><?=form_input('login', '')?></td>
    <td><?=form_password('password', '')?></td>
    <td><?=form_input('email', '')?></td>
    <td><?=form_dropdown("role_id", $roles, array())?></td>
    <td align="left"><?=form_submit('add_user', "Add")?></td>
    <?=form_close();?>
</tr>

<?php foreach ($users as $user): ?>
<tr>
    <?=form_open('users/edit/')?>
    <?=form_hidden('user_id', $user->id)?>
    <td><?=$user->login?></td>
    <td>*****</td>
    <td><?=form_input('email', $user->email)?></td>
    <td><?=form_dropdown("role_id", $roles, $user->role_id)?></td>
    <td align="left">
        <?=form_submit('edit_user', $this->lang->line('ui_edit_button'))?>
        <a href='<?=events_url("users/delete?user_id=").$user->id?>'>
        <span class="deleteIcon"><?=img('images/delete_icon.png')?></span></a>
    </td>
    <?=form_close();?>
</tr>
<?php endforeach; ?>
</table>
