<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="common.css"/>
</head>

<script type="text/javascript" src="common.js"></script>

</body>

<h2 id="emp-summary">()</h2>

<table id="controls-table">
<tr>

<td>
<p>
<input id="given-name" type="text" placeholder="Ім'я" disabled/>
</p>
<p>
<input id="family-name" type="text" placeholder="Прізвище" disabled/>
</p>
<p>
<select id="role-modify-sel">
<?php
require_once("view/RolesView.php");
echo (new RolesView())->getView();
?>
</select>
</p>
</td>

<td>
<button id="add-emp" type="button" onclick="addEmployee();">Новий</button>
</td>
</tr>

<tr>

<td>
<button class="row-modify-btn" type="button" disabled onclick="modifyEmployee();">Змінити</button>
<button class="row-modify-btn" type="button" disabled onclick="deleteEmployee();">Видалити</button>
</td>

<td>
<button id="add-emp-yes" type="button" style="display: none;" onclick="addEmployeeYes();">Додати</button>
<button id="add-emp-no" type="button" style="display: none;" onclick="addEmployeeNo();">Скасувати</button>
</td>

</tr>
</table>

<div>
<table id="emp-table">
<thead>
<tr>
<th><input type="radio" disabled/></th>
<th>Прізвище</th><th>Ім'я</th><th>Посада</th>
</tr>
</thead>

<tbody id="emp-tbody">

<?php
require_once("view/EmployeesEchoView.php");
(new EmployeesEchoView())->makeEcho();
?>

</tbody>
</table>
</div>

</body>
</html>
