<table class="news_table">    <div class='Title'><h1>Creating news</h1></div>       <tr>        <?=form_open('news/add')?>		<td align="left"><?=form_input('title','')?></td>		<td align="left"><?=form_textarea('text','')?></td>		<td align="left"><?=form_submit('add_city', 'Add')?></td>		    <?=form_close();?>		</tr>        <table class="Content">            <?php foreach ($news as $new): ?>            <?=form_open('news/edit')?>            <?=form_hidden('new_id', $new->id)?>            <tr>                <td><?=form_input('title', $new->title)?></td>				<td><?=form_textarea('text', $new->text)?></td>                <td align="left">                    <?=form_submit('edit_new', 'Edit')?>                    <a href='<?='news/delete?new_id='.$new->id?>'>                    <span class="deleteIcon"><?=img('images/delete_icon.png')?></span></a>                </td>            </tr>            <?=form_close();?>        <?php endforeach; ?>        </table></table>