<?php

	function verificarLogin(){

		return isset($_SESSION['usuario']) && !empty($_SESSION['usuario']);

	}

	function verificarPermissaoAdmin(){

		if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && $_SESSION['usuario']['funcao'] == 1){

			return true;

		}

		return false;

	}