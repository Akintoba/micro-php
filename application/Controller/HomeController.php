<?php
namespace Mini\Controller;

use Mini\Libs\Validator;

class HomeController
{
	public function index()
	{
		require VIEW. 'home/index.php';
	}

	public function validate()
    {
    	$validator = new Validator();

		$_POST = $validator->sanitize($_POST);

		$validator->validation_rules(array(
			'username'	=> 'required|alpha_numeric|max_len,100|min_len,6',
			'email'		=> 'required',
			'password'	=> 'required|min_len,8'
		));

		$validator->filter_rules(array(
			'username'	=> 'trim|sanitize_string',
			'email'		=> 'trim|sanitize_string',
			'password'	=> 'trim|sanitize_string'
		));

		$validated = $validator->run($_POST);

		if($validated === false){
			$validated = $validator->get_readable_errors(true);
			echo $validated;
		}

		else{
			echo "Success:";
			print_r($validated);
		}
	}
}
