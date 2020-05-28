<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");


if (isset($_GET['error'])  && !empty($_GET['error'])) {

	switch ($_GET['error']) {
		case 'correoRegistrado':
			$tipoError = '
			<span class="h4 text-danger">'.$_GET['idCorreo'].'</span>
			<br>
			Correo registrado.
			<br>';
			break;
		case 'correoR01':
			$tipoError = '
			<span class="h4 text-danger">'.$_GET['idCorreo'].'</span>
			<br>
			Ya llenaste este cuestionario.
			<br>';
			break;

		case 'faltanCampos':
			$tipoError = '
			<span class="h4 text-danger">¡Llena todos los campos!</span>
			<br>';
			break;
		case 'usrRegistrado':
			$tipoError = '
			<span class="h4 text-danger">'.$_GET['idUsrReg'].'</span>
			<br>
			Tu registro fue exitoso.
			<br>';

			// esto no es lo correcto pero le da seguridad al usuario

			break;

		case 'usrNoValido':
			$tipoError = '
			<span class="h4 text-danger">¡Usuario no Registrado!</span>
			<br>
			Revisa tu <b>nombre</b> o <b>correo</b> y vuelve a intentarlo.
			<br>';
			break;

		case 'pswNoValido':
			$tipoError = '
			<span class="h4 text-danger">¡Password no valido!</span>
			<br>
			Revisa tu password.
			<br>';
			break;

		case 'usrNoActivo':
			$tipoError = '
			<span class="h4 text-danger">¡Aun no has activado tu cuenta!</span>
			<br>
			Te recomendamos revisar tu correo.
			<br>';
			break;

		case 'usrIdNoValido':
			$tipoError = '
			<span class="h4 text-danger">¡Correo no reconocido!</span>
			<br>
			<br>
			Parece que hay un error con tu correo, te recomendamos regístrate nuevamente.
			<br>';
			break;
		
		case 'numEmpNoValido':
			$tipoError = '
			<span class="h4 text-danger">¡Número de empleado no encontrado!</span>
			<br>
			<br>
			Parece que hay un error con tu número de empleado, te recomendamos regístrate nuevamente.
			<br>';
			break;

		default:
			$tipoError = '
			<h1 class="light animated swing delay-1s">ERROR 404 :/</h1>
			<h5>Página web no encontrada</h5>
			';
			break;
	}


}else{
	$tipoError = '
	<h1 class="light animated swing delay-1s">ERROR 404 :/</h1>
	<h5>Página web no encontrada</h5>
	';
}

 ?>

<!DOCTYPE html>
<html lang="es>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Error</title>
	<link rel="stylesheet" href="../css/materialize.min.css">
	<link rel="stylesheet" href="../css/animate.min.css">
</head>
<body>
	<div class="valign-wrapper red" style="width: 100%; height: 100%; position: absolute;">
		<div class="valign" style="width:100%;">
			<div class="container">
				<div class="row">
					<div class="col s12 m6 offset-m3">
						<div class="card animate__animated animate__fadeIn">
							<div class="card-content center-align">
								<?php echo $tipoError ;?>
								<div class="section">
									<a href="../" class="btn red">Click aquí para regresar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<script src="../js/materialize.min.js"></script>
</body>
</html>


