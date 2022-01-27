<?php

include_once("./database/constants.php");

if (isset($_SESSION["userid"])) {
	# code...
	session_destroy();
}

header("location:".DOMAIN."/");




?>