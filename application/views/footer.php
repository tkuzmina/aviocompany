</div>
<div class="footer">
<p>AVIO.LV &copy; Copyright 2012. All rights reserved. </p>
<p>Contacts: service@avio.lv</p>

<?php if (!$current_user): ?>
<a data-toggle="modal" href="#login" class="login">Admin login</a>
<?php endif; ?>

</div>
</div>

<div class="modal" id="login">
    <div class="modal-header">
        <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h2>Admin login</h2>
    </div>
    <?=form_open('users/login', array("class" => "form-horizontal"))?>
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="login">Login</label>
                <div class="controls">
                    <?=form_input('login', set_value('login'))?>
			    </div>
			</div>
            <div class="control-group">
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <?=form_password('password')?>
			    </div>
			</div>
            <div class="modal-footer">
                <a class="btn" id="loginClose">Close</a>
                <?=form_submit('login_form', 'Login', "class='btn btn-primary'")?>
            </div>
    <?=form_close();?>
       </div>
</div>

<script type="text/javascript">
    $(function() {
        var login = $("#login");
        login.modal().modal('hide');
        $("#loginClose").on('click', function() {
            login.modal('hide');
        });
    })
</script>

</body>
</html>