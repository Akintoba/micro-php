<?php
namespace Mini\Controller;

class ValidationController
{
	public function login($array)
	{
		$validator = new Validator();

		$_POST = $validator->sanitize($array);

		$validator->validation_rules(array(
			'username'    => 'required|alpha_numeric|max_len,100|min_len,6',
			'password'	  => 'required|min_len,8'
		));
		$validator->filter_rules(array(
			'username' => 'trim|sanitize_string',
			'password' => 'trim|sanitize_string'
		));

		$validated = $validator->run($_POST);

		if($validated === false) {

			$validated = $validator->get_readable_errors(true);
		}
		return $validated;
	}
}
