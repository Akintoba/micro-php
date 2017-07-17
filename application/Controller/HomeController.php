<?php
namespace Mini\Controller;

use Mini\Libs\Validator;

class HomeController
{
	public function index()
	{
		require VIEW . '_template/header.php';
		require VIEW . 'home/index.php';
		require VIEW . '_template/footer.php';
	}

	public function validate()
    {
    	$validator = new Validator();

		$_POST = $validator->sanitize($_POST);

		$rules = array(
			'username'    => 'required|alpha_numeric|max_len,100|min_len,8',
			'password'    => 'required|max_len,100|min_len,8'
		);

		$filters = array(
			'username' 	  => 'trim|sanitize_string',
			'password'	  => 'trim|base64_encode'
		);

		$validated = $validator->validate($_POST, $rules);
		$_POST 	   = $validator->filter($_POST, $filters);

		if($validated === TRUE) {
			print_r($_POST);
		}
		else {
			echo $validator->get_readable_errors(true);
		}
	}
}
