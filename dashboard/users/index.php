<?php
require("../lib/page.php");
Page::header("Usuarios");

if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM usuarios WHERE apellidos LIKE ? OR nombres LIKE ? ORDER BY apellidos";
	$params = array("%$search%", "%$search%");
}
else
{
	$sql = "SELECT * FROM usuarios ORDER BY apellidos";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
?>

<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<i class='material-icons prefix'>search</i>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
		<div class='input-field col s6 m4'>
			<button type='submit' class='btn waves-effect green'><i class='material-icons'>check_circle</i></button> 	
		</div>
		<div class='input-field col s12 m4'>
			<a href='save.php' class='btn waves-effect indigo'><i class='material-icons'>add_circle</i></a>
		</div>
	</div>
</form>
<table class='striped'>
	<thead>
		<tr>
			<th>APELLIDOS</th>
			<th>NOMBRES</th>
			<th>CORREO</th>
			<th>ALIAS</th>
			<th>ACCIÓN</th>
		</tr>
	</thead>
	<tbody>

<?php
	foreach($data as $row)
	{
		print("
			<tr>
				<td>".$row['apellidos']."</td>
				<td>".$row['nombres']."</td>
				<td>".$row['correo']."</td>
				<td>".$row['alias']."</td>
				<td>
					<a href='save.php?id=".$row['id_usuario']."' class='blue-text'><i class='material-icons'>edit</i></a>
					<a href='delete.php?id=".$row['id_usuario']."' class='red-text'><i class='material-icons'>delete</i></a>
				</td>
			</tr>
		");
	}
	print("
		</tbody>
	</table>
	");
} //Fin de if que comprueba la existencia de registros.
else
{
	Page::showMessage(4, "No hay registros disponibles", "save.php");
}
Page::footer();
?>