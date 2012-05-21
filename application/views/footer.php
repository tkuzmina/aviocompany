</div>
<div class="footer">
<p>AVIO.LV &copy; Copyright 2012. <?=$this->lang->line('ui_all_rights_reserved')?>.</p>
<p><?=$this->lang->line('ui_contacts')?>: service@avio.lv</p>

<?php if (!$current_user): ?>
<a data-toggle="modal" href="#login" class="login"><?=$this->lang->line('ui_user_login')?></a>
<?php endif; ?>

</div>
</div>

<div class="modal" id="login">
    <div class="modal-header">
        <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h2><?=$this->lang->line('ui_user_login')?></h2>
    </div>
    <?=form_open('users/login', array("class" => "form-horizontal"))?>
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="login"><?=$this->lang->line('ui_login')?></label>
                <div class="controls">
                    <?=form_input('login', set_value('login'))?>
			    </div>
			</div>
            <div class="control-group">
                <label class="control-label" for="password"><?=$this->lang->line('ui_password')?></label>
                <div class="controls">
                    <?=form_password('password')?>
			    </div>
			</div>
            <div class="modal-footer">
                <a class="btn" id="loginClose"><?=$this->lang->line('ui_close')?></a>
                <?=form_submit('login_form', $this->lang->line('ui_sign'), "class='btn btn-primary'")?>
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