<?php include("header.php"); ?><a class="btn" data-toggle="modal" href="#question"><?=$this->lang->line('ui_got_a_question_ask')?></a><table class="fill">    <tr>        <td>            <?php include("search_view.php"); ?>        </td>        <td>		    <div class="find_reserv">            <strong><?=$this->lang->line('ui_find_reservation_by_reservation_number')?>:</strong> <input id="findReservation" class="span2">            <button id="findReservationButton" class="btn btn-primary"><?=$this->lang->line('ui_go')?></button>			</div>			<a class="banner">			<img src='<?=avio_resource_url("img/banner.jpg")?>' alt="Visit Denmark" title="Visit Denmark" />			</a>			        </td>    </tr></table><h1 class="title"><?=$this->lang->line('ui_latest_news')?></h1><table class="table table-bordered newsTable"><?php foreach ($news as $new): ?><div class="news_info">    <div class="news_main">        <div class="news_name"><?=$new->title?></div>        <div class="news_date">		    <strong><?=$this->lang->line('ui_added_on')?>:</strong>			<?=$new->created_date?>		</div>    </div>    <div class="news_text"><?=$new->text?></div></div>    <?php endforeach; ?>	</table><div class="modal" id="question">    <div class="modal-header">        <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>        <h2><?=$this->lang->line('ui_ask_a_question')?></h2>    </div>    <?php if (validation_errors()): ?><div class="alert alert-error"><?= validation_errors(); ?></div><?php endif; ?>    <?=form_open('main/add_question', array("class" => "form-horizontal"))?>        <div class="modal-body">            <div class="control-group">                <label class="control-label" for="name"><?=$this->lang->line('ui_your_name')?></label>                <div class="controls">                    <?=form_input('name', set_value('name'), validation_class("name"))?>                </div>            </div>            <div class="control-group">                <label class="control-label" for="email"><?=$this->lang->line('ui_your_email')?></label>                <div class="controls">                    <?=form_input('email', set_value('email'), validation_class("email"))?>                </div>            </div>            <div class="control-group">                <label class="control-label" for="text"><?=$this->lang->line('ui_question')?></label>                <div class="controls">                    <?=form_textarea('text', set_value('text'), validation_class("text"))?>                </div>            </div>            <div class="modal-footer">                <a class="btn" id="questionClose"><?=$this->lang->line('ui_close')?></a>                <?=form_submit('add_question', $this->lang->line('ui_submit'), "class='btn btn-primary'")?>            </div>    <?=form_close();?>       </div></div><script type="text/javascript">    $(function() {        $("#findReservationButton").on('click', function() {            var ticket_id = $("#findReservation").val();            if (ticket_id) {                window.location.href = '<?=avio_url("tickets?ticket_id=")?>' + ticket_id;            }        });        var question = $("#question");        question.modal().modal('hide');        $("#questionClose").on('click', function() {            question.modal('hide');        });        <?php if (validation_errors()): ?>            question.modal().modal('show');        <?php endif; ?>    })</script><?php include("footer.php"); ?>