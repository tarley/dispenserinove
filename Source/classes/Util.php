<?php
class Util {
	
	public function alerta($mensagem) {
		echo "<script>alert('".$mensagem."');</script>";
	}
	
	public function Redirect($url, $permanent = false)
	{
		header('Location: ' . $url, true, $permanent ? 301 : 302);
	
		exit();
	}
}

?>