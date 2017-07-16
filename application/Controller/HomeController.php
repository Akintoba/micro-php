<?php
namespace Mini\Controller;

use Mini\Libs\Validator;
use Mini\Controller\Validation;

class HomeController
{
	public function index()
	{
		require VIEW. 'home/index.php';
	}

    public function validate()
    {
    	$Validation = new Validation();
    	$validations = $Validation->login($_POST);

    	print_r($validations);
		// require VIEW . 'home/validate.php';
	}
}
