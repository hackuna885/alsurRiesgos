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

	if($correoMd5 === $usuarioCript){
		if($passDecrypt === $passCript){
			echo json_encode('
			<meta http-equiv="REFRESH" content="0; url=inicio/index.php">
			');
		}else{
			echo json_encode('
			<div class="red lighten-5" style="padding: 0px 10px; margin-bottom: 20px;">
				<p>Contraseña no valida</p>
			</div>
			');
		}
	}else{
		echo json_encode('
		<div class="red lighten-5" style="padding: 0px 10px; margin-bottom: 20px;">
			<p>Usuario no valido</p>
		</div>
		');
	}
}

 ?>