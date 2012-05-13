<?=form_open('flight_search/search_by_params', array("class" => "form-horizontal"))?>
<table class="searchTable">
    <tr class="searchLabelRow">
        <td colspan="3"><strong>City from:</strong></td>
        <td><strong>Flight date:</strong></td>
    </tr>
    <tr>
        <td colspan="3"><?=form_dropdown('city_from_id', $city_list, $city_from_id, "class='span3'")?></td>
        <td><?=form_input(array('name' => 'date_to', 'value' => $date_to, 'class' => 'span2 datepicker'))?></td>
    </tr>
    <tr class="searchLabelRow">
        <td colspan="3"><strong>City to:</strong></td>
        <td><strong>Return date:</strong></td>
    </tr>
    <tr>
        <td colspan="3"><?=form_dropdown('city_to_id', $city_list, $city_to_id, "class='span3'")?></td>
        <td><?=form_input(array('name' => 'date_return', 'value' => $date_return, 'class' => 'span2 datepicker'))?></td>
    </tr>
    <tr class="searchLabelRow">
        <td><strong>Adults:</strong></td>
        <td><strong>Children:</strong></td>
        <td><strong>Infants:</strong></td>
        <td><strong>Class:</strong></td>
    </tr>
    <tr>
        <td><?=form_dropdown('adult_count', $count_list, $adult_count, "class='span1'")?></td>
        <td><?=form_dropdown('child_count', $count_list, $child_count, "class='span1'")?></td>
        <td><?=form_dropdown('infant_count', $count_list, $infant_count, "class='span1'")?></td>
        <td><?=form_dropdown('class_id', $classes_list, $class_id, "class='fill'")?></td>
    </tr>
    <tr class="searchLabelRow">
        <td colspan="4"><?=form_submit('search_flight', 'Search', "class='btn btn-primary pull-right'")?></td>
    </tr>
</table>

<?=form_close();?>