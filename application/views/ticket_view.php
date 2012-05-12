<?php include("header.php"); ?>
<h1>Thank you for choosing our flight reservation system!</h1>
<table class="table table-bordered">
<thead>
<h2>Information about flight:</h2>
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
<h2>Information about passanger(s):</h2>
<tr>
  <th>Name</th>
  <th>Surname</th>
  <th>Luggage count</th>
  <th>Passport number</th>
  <th>Issue date</th>
  <th>Expiration date</th>
</tr>
</thead>
<?php foreach ($passengers as $passenger): ?>
<tr>
    <td><?= $passenger->name ?></td>
    <td><?= $passenger->surname ?></td>
    <td><?= $passenger->luggage_count ?></td>
    <td><?= $passenger->passport_number ?></td>
	<td><?= $passenger->issue_date ?></td>
	<td><?= $passenger->expiration_date ?></td>
</tr>
<?php endforeach ?>
</table>

<?php include("footer.php"); ?>
