<?php

class controller {

	function __construct()
	{
		
	}

	// verifica se uma variável está setada e possui conteúdo, retornando seu valor sanatizado ou null
	protected function temValor($var){

		return (isset($var) && !empty($var)) ? addslashes($var) : null;
				
		
	}
}