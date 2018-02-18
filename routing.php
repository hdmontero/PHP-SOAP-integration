<?php 
require_once('controllers/OperatorsController.php');

use Controllers\OperatorsController;

// take called action from request
$action = $_POST['action'];

// check action requested
switch ($action) {
	case 'load_operators':
		(new OperatorsController())->getOperators();
		break;
		
	case 'save_operator':
		(new OperatorsController())->addOperator();
		break;
		
	default:
		die('Method not implemented!');
		break;		
}