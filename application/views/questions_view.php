<?php include("header.php"); ?>

<h1 class="title"><?=$this->lang->line('ui_questions')?></h1>
<table class="table table-bordered">
<h2><?=$this->lang->line('ui_submitted_questions')?></h2>
    <thead>
        <tr>
            <td width='130px'><?=$this->lang->line('ui_submitted_on')?></td>
            <td width='100px'><?=$this->lang->line('ui_person_name')?></td>
            <td width='100px'><?=$this->lang->line('ui_email')?></td>
            <td><?=$this->lang->line('ui_text')?></td>
			<td width='100px'><?=$this->lang->line('ui_actions')?></td>
	    </tr>
    </thead>			
 <?php foreach ($questions as $question): ?>
    <tr>
        <td><?=$question->created_date?></td>
        <td><?=$question->name?></td>
        <td><?=$question->email?></td>
        <td><?=$question->text?></td>
        <td><a href='<?=avio_url('questions/delete?question_id='.$question->id)?>'<i class="icon-trash" title="delete"></i></a></td>
    </tr>
<?php endforeach; ?>
	
</table>
<script type="text/javascript">
    $(function() {
		var menuItems = $(".menuItem");
        if (menuItems) {
        menuItems.removeClass("active");
        $(".menuItem#questions").addClass("active");
        }
    })
</script>

<?php include("footer.php"); ?>
