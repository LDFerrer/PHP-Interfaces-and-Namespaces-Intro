<?php

error_reporting(-1);

ini_set('display_errors', 1);

require_once( __DIR__ . '/DataInterfaces/Model.php' );

class myClass implements DataInterfaces\Model\APISource {
	public function __construct(){
		echo 'Succesfully initialized.';
	}
	
	public function ErrorEvent() {
		
	}
	
	public function checkAsWriteOp(): bool {
		
	}
}

$instancia = new myClass;