<?=form_open('flight_search/search_by_params', array("class" => "form-horizontal"))?>
<table class="searchTable">
    <tr class="searchLabelRow">
        <td colspan="3"><strong><?=$this->lang->line('ui_city_from')?>:</strong></td>
        <td><strong><?=$this->lang->line('ui_flight_date')?>:</strong></td>
    </tr>
    <tr>
        <td colspan="3"><?=form_dropdown('city_from_id', $city_list, $city_from_id, "class='span3'")?></td>
        <td><?=form_input(array('name' => 'date_to', 'value' => $date_to, 'class' => 'span2 datepicker'))?></td>
    </tr>
    <tr class="searchLabelRow">
        <td colspan="3"><strong><?=$this->lang->line('ui_city_to')?>:</strong></td>
        <td><strong><?=$this->lang->line('ui_return_date')?>:</strong></td>
    </tr>
    <tr>
        <td colspan="3"><?=form_dropdown('city_to_id', $city_list, $city_to_id, "class='span3'")?></td>
        <td><?=form_input(array('name' => 'date_return', 'value' => $date_return, 'class' => 'span2 datepicker'))?></td>
    </tr>
    <tr class="searchLabelRow">
        <td><strong><?=$this->lang->line('ui_adults')?>:</strong></td>
        <td><strong><?=$this->lang->line('ui_children')?>:</strong></td>
        <td><strong><?=$this->lang->line('ui_infants')?>:</strong></td>
        <td><strong><?=$this->lang->line('ui_class')?>:</strong></td>
    </tr>
    <tr>
        <td><?=form_dropdown('adult_count', $adult_count_list, $adult_count, "class='span1'")?></td>
        <td><?=form_dropdown('child_count', $count_list, $child_count, "class='span1'")?></td>
        <td><?=form_dropdown('infant_count', $count_list, $infant_count, "class='span1'")?></td>
        <td><?=form_dropdown('class_id', $classes_list, $class_id, "class='fill'")?></td>
    </tr>
    <tr class="searchLabelRow">
        <td colspan="4"><?=form_submit('search_flight', $this->lang->line('ui_search'), "class='btn btn-primary pull-right'")?></td>
    </tr>
</table>

<?=form_close();?>