<?php
namespace Mini\Controller;

use Mini\Libs\Gump;

class HomeController
{
	public function index()
	{
		require VIEW. 'home/index.php';
	}
    public function validate()
    {
    	$gump = new GUMP();

		$_POST = $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

		$gump->validation_rules(array(
			'username'    => 'required|alpha_numeric|max_len,100|min_len,6'
		));

		$gump->filter_rules(array(
			'username' => 'trim|sanitize_string'
		));

		$validated_data = $gump->run($_POST);

		if($validated_data === false) {
			$result = $gump->get_readable_errors(true);
		} else {
			$result = '';
			foreach ($validated_data as $key=>$value) // validation successful
			{
				$result.= $key." is valid: ".$value;
			}
		}

		require VIEW . 'home/validate.php';
	}
}
