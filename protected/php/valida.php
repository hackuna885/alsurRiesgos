<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$pass = (isset($_POST['pass'])) ? $_POST['pass'] : '';

if($usuario === '' || $pass === ''){
    echo json_encode('error');
}else{

	$usuarioCript = md5($usuario);
	$passCript = md5($pass);

	$con = new SQLite3("../data/riesgos.db");
	$cs = $con -> query("SELECT * FROM registroUsr WHERE correoMd5 = '$usuarioCript'");

	while ($resul = $cs -> fetchArray()) {
		$nombre = $resul['nombre'];
		$area = $resul['area'];
		$correo = $resul['correo'];
		$correoMd5 = $resul['correoMd5'];
		$passDecrypt = $resul['passDecrypt'];
		$tipoUsuario = $resul['tipoUsuario'];
		$usrActivo = $resul['usrActivo'];
	}

	$correoMd5 = (isset($correoMd5)) ?  $correoMd5 : '';
	$passDecrypt = (isset($passDecrypt)) ?  $passDecrypt : '';

	/*VALIDACIÓN DE CORREO*/

	if($correoMd5 === $usuarioCript){

		/*VALIDACIÓN DE PASSWORD*/

		if($passDecrypt === $passCript){

			/*VALIDACIÓN DE USUARIO ACTIVO*/
			
			if($usrActivo === '1'){
				echo json_encode('
				<meta http-equiv="REFRESH" content="0; url=inicio/home.app">
				');
			}else{
				echo json_encode('
				<div class="red lighten-5 red-text text-darken-4" style="padding: 0px 10px; margin-bottom: 20px;">
					<i>Tu usuario esta bloqueado o inactivo</i>
				</div>
				');
			}

		}else{
			echo json_encode('
			<div class="red lighten-5 red-text text-darken-4" style="padding: 0px 10px; margin-bottom: 20px;">
				<i>Contraseña no valida</i>
			</div>
			');
		}
	}else{
		echo json_encode('
		<div class="red lighten-5 red-text text-darken-4" style="padding: 0px 10px; margin-bottom: 20px;">
			<i>Usuario no valido</i>
		</div>
		');
	}
}

 ?>