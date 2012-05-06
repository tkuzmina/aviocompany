<?php include("header.php"); ?>


<a class="btn btn-primary" data-toggle="modal" href="#newFlight" >Add new flight</a>

<table class="table table-bordered flightsTable">

    <thead>
    <tr>
        <th rowspan="3">City from</th>
        <th rowspan="3">City to</th>
        <th rowspan="3">Datetime from</th>
        <th rowspan="3">Datetime to</th>
        <th rowspan="3">Plane model</th>
        <th colspan="6">Prices</th>
        <th rowspan="3"></th>
    </tr>
    <tr>
        <th colspan="3">Economy</th>
        <th colspan="3">Business</th>
    </tr>
    <tr>
        <th>Adult</th>
        <th>Child</th>
        <th>Infant</th>
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
        <td>
            <div class='view_data <?=$view_id?>'><?=$city_list[$flight->city_from_id]?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_dropdown('city_from_id', $city_list, $flight->city_from_id, "class='span2' id='city_from_id'")?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$city_list[$flight->city_to_id]?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_dropdown('city_to_id', $city_list, $flight->city_to_id, "class='span2' id='city_to_id'")?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->date_from?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'date datepicker', 'name' => 'date_from', 'id' => 'date_from', 'value' => $flight->date_from))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->date_to?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'date datepicker', 'name' => 'date_to', 'id' => 'date_to', 'value' => $flight->date_to))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$plane_list[$flight->plane_id]?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_dropdown('plane_id', $plane_list, $flight->plane_id, "class='span2' id='plane_id'")?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_economy?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_economy', 'id' => 'price_economy', 'value' => $flight->price_economy))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_business?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_business', 'id' => 'price_business', 'value' => $flight->price_business))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_e_child?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_e_child', 'id' => 'price_e_child', 'value' => $flight->price_e_child))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_b_child?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_b_child', 'id' => 'price_b_child', 'value' => $flight->price_b_child))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_e_infant?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_e_infant', 'id' => 'price_e_infant', 'value' => $flight->price_e_infant))?></div>
        </td>
        <td>
            <div class='view_data <?=$view_id?>'><?=$flight->price_b_infant?></div>
            <div class='edit_data <?=$edit_id?>'><?=form_input(array('class' => 'price', 'name' => 'price_b_infant', 'id' => 'price_b_infant', 'value' => $flight->price_b_infant))?></div>
        </td>
        <td>
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
    <?=form_close();?>
    <?php endforeach; ?>

</table>

<div class="modal" id="newFlight">
  <div class="modal-header">
    <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
    <h3>Add new plane</h3>
  </div>
  <?=form_open('flights/add', array("class" => "form-horizontal"))?>
  <div class="modal-body">
          <div class="control-group">
            <label class="control-label" for="city_from_id">City from</label>
            <div class="controls">
                <?=form_dropdown('city_from_id', $city_list, $flight->city_from_id, "class='span2' id='city_from_id'")?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="city_to_id">City to</label>
            <div class="controls">
                <?=form_dropdown('city_to_id', $city_list, $flight->city_to_id, "class='span2' id='city_to_id'")?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="date_from">Date from</label>
            <div class="controls">
                <?=form_input(array('class' => 'span2 datepicker', 'name' => 'date_from', 'id' => 'date_from', 'value' => $flight->date_from))?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="date_to">Date to</label>
            <div class="controls">
                <?=form_input(array('class' => 'span2 datepicker', 'name' => 'date_to', 'id' => 'date_to', 'value' => $flight->date_to))?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="plane_id">Plane</label>
            <div class="controls">
                <?=form_dropdown('plane_id', $plane_list, $flight->plane_id, "class='span2' id='plane_id'")?>
            </div>
          </div>

      <table class="table">
          <thead>
          <tr>
              <th></th>
              <th>Economy class</th>
              <th>Business class</th>
          </tr>
          </thead>
          <tr>
              <td><strong>Adult</strong></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_economy', 'id' => 'price_economy', 'value' => $flight->price_economy))?><span class="add-on">Ls</span></div></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_business', 'id' => 'price_business', 'value' => $flight->price_business))?><span class="add-on">Ls</span></div></td>
          </tr>
          <tr>
              <td><strong>Child</strong></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_e_child', 'id' => 'price_e_child', 'value' => $flight->price_e_child))?><span class="add-on">Ls</span></div></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_b_child', 'id' => 'price_b_child', 'value' => $flight->price_b_child))?><span class="add-on">Ls</span></div></td>
          </tr>
          <tr>
              <td><strong>Infant</strong></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_e_infant', 'id' => 'price_e_infant', 'value' => $flight->price_e_infant))?><span class="add-on">Ls</span></div></td>
              <td><div class="input-append"><?=form_input(array('class' => 'span1', 'name' => 'price_b_infant', 'id' => 'price_b_infant', 'value' => $flight->price_b_infant))?><span class="add-on">Ls</span></div></td>
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
        $(".edit_data").hide();
        $(".edit_button").on('click', function() {
            var id = $(this).attr('id').replace("edit_", "");
            $(".view_" + id).hide();
            $(".edit_" + id).show();
        });
        $(".cancel_button").on('click', function() {
            $(".view_data").show();
            $(".edit_data").hide();
        });
    })
</script>

<?php include("footer.php"); ?>