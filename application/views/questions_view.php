<?php include("header.php"); ?>

<h1 class="title">Questions</h1>
<table class="table table-bordered">
<h2>Submitted questions</h2>
    <thead>
        <tr>
            <td width='130px'>Submitted on</td>
            <td width='100px'>Name</td>
            <td width='100px'>Email</td>
            <td>Text</td>
			<td width='100px'>Actions</td>
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

<?php include("footer.php"); ?>
