<?php include("header.php"); ?><h1 class="title"><?=$this->lang->line('ui_news')?></h1><a class="btn btn-primary" data-toggle="modal" href="#newNew" ><?=$this->lang->line('ui_add_news')?></a><table class="table table-bordered newsTable"><h2><?=$this->lang->line('ui_existing_news')?></h2>    <thead>        <tr>            <td width='100px'><?=$this->lang->line('ui_title')?></td>			<td><?=$this->lang->line('ui_text')?></td>			<td><?=$this->lang->line('ui_actions')?></td>	    </tr>    </thead>			<?php foreach ($news as $new): ?>    <?php        $view_id = "view_".$new->id;        $edit_id = "edit_".$new->id;    ?> <?=form_open('news/edit')?>            <?=form_hidden('new_id', $new->id)?>            <?=form_hidden('user_id', $current_user->id)?>    <tr>        <td>            <div class='view_data <?=$view_id?>'><?=$new->title?></div>            <div class='edit_data <?=$edit_id?>'><?=form_input('title', $new->title)?></div>        </td>	    <td>            <div class='view_data <?=$view_id?>'><?=$new->text?></div>            <div class='edit_data <?=$edit_id?>'><?=form_textarea('text', $new->text)?></div>        </td>        <td>            <span class='edit_data <?=$edit_id?>'>                <?=form_submit('edit_new', $this->lang->line('ui_save'), "class='btn btn-primary'")?>                <a class="cancel_button"><i class="icon-remove"></i></a>            </span>            <span class='view_data <?=$view_id?>'>                <a class="edit_button" id=<?="'edit_".$new->id."'" ?>><i class="icon-edit" title="edit"></i></a>                <a href='<?=avio_url('news/delete?new_id='.$new->id)?>'><i class="icon-trash" title="delete"></i></a>            </span>        </td>    </tr>    <?=form_close();?>    <?php endforeach; ?>	</table><div class="modal" id="newNew">    <div class="modal-header">        <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>        <h2><?=$this->lang->line('ui_create_news')?></h2>    </div>    <?=form_open('news/add', array("class" => "form-horizontal"))?>        <?=form_hidden('user_id', $current_user->id)?>        <div class="modal-body">            <div class="control-group">                <label class="control-label" for="title"><?=$this->lang->line('ui_title')?></label>                <div class="controls">		                    <?=form_input('title','')?>			    </div>			</div>               <div class="control-group">                <label class="control-label" for="text"><?=$this->lang->line('ui_text')?></label>                <div class="controls">		                    <?=form_textarea('text','')?>			    </div>			</div>		</div> 			        <div class="modal-footer">            <a class="btn" id="newNewClose"><?=$this->lang->line('ui_close')?></a>            <?=form_submit('add_new', $this->lang->line('ui_save'), "class='btn btn-primary'")?>        </div>    <?=form_close();?>       </div><script type="text/javascript">    $(function() {        var newNew = $("#newNew");        newNew.modal().modal('hide');        $("#newNewClose").on('click', function() {            newNew.modal('hide');        });		var menuItems = $(".menuItem");        if (menuItems) {        menuItems.removeClass("active");        $(".menuItem#news").addClass("active");        }    })</script><?php include("footer.php"); ?>