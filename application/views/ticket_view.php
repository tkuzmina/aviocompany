<?php include("header.php"); ?>

<table class="table table-bordered">
<thead>
<tr>
  <th>City from </th>
  <th>City to</th>
  <th>Datetime from</th>
  <th>Datetime to</th>
</tr>
</thead>
<tr>
    <td><?= $flight->city_from_name ?></td>
    <td><?= $flight->city_to_name ?></td>
    <td><?= $flight->date_from ?></td>
    <td><?= $flight->date_to ?></td>
</tr>
</table>

<table class="table table-bordered">
<thead>
<tr>
  <th>Name</th>
  <th>Surname</th>
  <th>Telephone</th>
  <th>Luggage count</th>
  <th>Passport number</th>
</tr>
</thead>
<?php foreach ($passengers as $passenger): ?>
<tr>
    <td><?= $passenger->name ?></td>
    <td><?= $passenger->surname ?></td>
    <td><?= $passenger->telephone ?></td>
    <td><?= $passenger->luggage_count ?></td>
    <td><?= $passenger->passport_int ?></td>
</tr>
<?php endforeach ?>
</table>

<?php include("footer.php"); ?>
