<?php include("header.php"); ?>
<h1 class="title">Flights</h1>

<a class="btn btn-primary" data-toggle="modal" href="#newFlight" >Add new flight</a>

<table class="table table-bordered flightsTable fill">
<h2>Existing flights</h2>
    <thead>
    <tr>
        <th rowspan="2">City from</th>
        <th rowspan="2">City to</th>
        <th rowspan="2">Date from</th>
        <th rowspan="2">Plane model</th>
        <th colspan="2">Free</th>
        <th rowspan="2"></th>
        <th colspan="3">Prices</th>
        <th rowspan="2"></th>
    </tr>
    <tr>
        <th>E</th>
        <th>B</th>
        <th>Adult</th>
        <th>Child</th>
        <th>Infant</th>
    </tr>
    </thead>
    <?php foreach ($flights as $flight): ?>
    <?php
        $view_id = "view_".$flight->id;
        $edit_id = "edit_".$flight->id;
    ?>
    <?=form_open('flights/edit')?>
    <?=form_hidden('flight_id', $flight->id)?>
    <tr>
        <td rowspan="2">
            <div class='view_data <?=$view_id?>'><?=$city_list[$flight->city_from_id]?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_dropdown('city_from_id', $city_list, $flight->city_from_id, "class='span2'")?></div>
        </td>
        <td rowspan="2">
            <div class='view_data <?=$view_id?>'><?=$city_list[$flight->city_to_id]?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_dropdown('city_to_id', $city_list, $flight->city_to_id, "class='span2'")?></div>
        </td>
        <td rowspan="2">
            <div class='view_data <?=$view_id?>'><?=$flight->date_from?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'date datepicker', 'name' => 'date_from', 'value' => $flight->date_from))?></div>
        </td>
        <td rowspan="2">
            <div class='view_data <?=$view_id?>'><?=$plane_list[$flight->plane_id]?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_dropdown('plane_id', $plane_list, $flight->plane_id, "class='span2'")?></div>
        </td>
        <td rowspan="2"><?= $flight->free_economy ?></td>
        <td rowspan="2"><?= $flight->free_business ?></td>
        <td>E</td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_economy?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_economy', 'value' => $flight->price_economy))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_e_child?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_e_child', 'value' => $flight->price_e_child))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_e_infant?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_e_infant', 'value' => $flight->price_e_infant))?></div>
        </td>
        <td rowspan="2">
            <span class='edit_data <?=$edit_id?>'>
                <?=form_submit('edit_flight', 'Save', "class='btn btn-primary'")?>
                <a class="cancel_button"><i class="icon-remove"></i></a>
            </span>
            <span class='view_data <?=$view_id?>'>
                <a class="edit_button" id=<?="'edit_".$flight->id."'" ?>><i class="icon-edit"></i></a>
                <a href='<?='flights/delete?flight_id='.$flight->id?>'><i class="icon-trash"></i></a>
            </span>
        </td>
    </tr>
    <tr>
        <td>B</td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_business?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_business', 'value' => $flight->price_business))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_b_child?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_b_child', 'value' => $flight->price_b_child))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_b_infant?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_b_infant', 'value' => $flight->price_b_infant))?></div>
        </td>
    </tr>
    <?=form_close();?>
    <?php endforeach; ?>

</table>

<div class="modal" id="newFlight">
    <div class="modal-header">
        <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
        <h2>Add new flight</h2>
    </div>
    <?=form_open('flights/add', array("class" => "form-horizontal"))?>
    <div class="modal-body">
        <table class="table fill">
            <thead>
            <tr>
                <th>City from</th>
                <th>City to</th>
                <th>Plane</th>
            </tr>
            </thead>
            <tr>
                <td><?=form_dropdown('city_from_id', $city_list, array(), "class='span2' id='city_from_id'")?></td>
                <td><?=form_dropdown('city_to_id', $city_list, array(), "class='span2' id='city_to_id'")?></td>
                <td><?=form_dropdown('plane_id', $plane_list, array(), "class='span2' id='plane_id'")?></td>
            </tr>
        </table>

        <table class="table fill">
            <thead>
            <tr>
                <th>Date from</th>
                <th>Time from</th>
                <th>Duration</th>
            </tr>
            </thead>
            <tr>
                <td class="span2"><?=form_input(array('class' => 'span2 datepicker', 'name' => 'date_from', 'id' => 'date_from', 'value' => '2012-05-13'))?></td>
                <td class="span2"><?=form_input(array('class' => 'span1 timepicker', 'name' => 'time_from', 'id' => 'time_from', 'value' => '07:00'))?></td>
                <td class="span2"><?=form_input(array('class' => 'span1 timepicker', 'name' => 'duration', 'id' => 'duration', 'value' => '02:00'))?></td>
            </tr>
        </table>

        <table class="table fill">
          <thead>
          <tr>
              <th></th>
              <th>Economy class</th>
              <th>Business class</th>
          </tr>
          </thead>
          <tr>
              <td><strong>Adult</strong></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_economy', 'id' => 'price_economy'))?><span class="add-on">Ls</span></div></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_business', 'id' => 'price_business'))?><span class="add-on">Ls</span></div></td>
          </tr>
          <tr>
              <td><strong>Child</strong></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_e_child', 'id' => 'price_e_child'))?><span class="add-on">Ls</span></div></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_b_child', 'id' => 'price_b_child'))?><span class="add-on">Ls</span></div></td>
          </tr>
          <tr>
              <td><strong>Infant</strong></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_e_infant', 'id' => 'price_e_infant'))?><span class="add-on">Ls</span></div></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_b_infant', 'id' => 'price_b_infant'))?><span class="add-on">Ls</span></div></td>
          </tr>
        </table>
    </div>
  <div class="modal-footer">
      <a class="btn" id="newFlightClose">Close</a>
      <?=form_submit('edit_flight', 'Save', "class='btn btn-primary'")?>
  </div>
    <?=form_close();?>
</div>

<script type="text/javascript">
    $(function() {
        var newFlight = $("#newFlight");
        newFlight.modal().modal('hide');
        $("#newFlightClose").on('click', function() {
            newFlight.modal('hide');
        });
    })
</script>

<?php include("footer.php"); ?>