<?php

namespace App\models;

use App\lib\Db;

abstract class DbModel {

	public $db;

	const validateTypeEmail = 'email';
	
	public function __construct() {
		$this->db = new Db;
	}

	public abstract function getRules();

	public function validateRules($post, $removeSession = true)
    {
        $errors = [];

        if($rules = $this->getRules()){
            foreach ($rules as $key=>$rule){
                if(!array_key_exists($key, $post) && !isset($rules[$key]['safeField'])){
                    $name = ucfirst($key);
                    $errors = array_merge($errors, ["$name isn't exist in post data"]);
                }else{
                    if(isset($rule['max_length']) && isset($rule['messages']['max_length']) && strlen($post[$key]) > $rule['max_length'])
                    {
                        $errors = array_merge($errors, [$rule['messages']['max_length']]);
                    }

                    if(isset($rule['min_length']) && isset($rule['messages']['min_length']) && strlen($post[$key]) < $rule['min_length'])
                    {
                        $errors = array_merge($errors, [$rule['messages']['min_length']]);
                    }

                    if(isset($rule['require']) && isset($rule['messages']['require']) && empty($post[$key]))
                    {
                        $errors = array_merge($errors, [$rule['messages']['require']]);
                    }

                    if(isset($rule['type']) && isset($rule['messages']['type']) && isset($post[$key]))
                    {
                        if($rule['type'] == self::validateTypeEmail && !filter_var($post[$key], FILTER_VALIDATE_EMAIL)){
                            $errors = array_merge($errors, [$rule['messages']['type']]);
                        }
                    }

                    if(isset($rule['pattern']) && isset($rule['messages']['pattern']) && !preg_match($rule['pattern'], $post[$key]))
                    {
                            $errors = array_merge($errors, [$rule['messages']['pattern']]);
                    }
                }
            }
        }

        $_SESSION['flash'] = ['errors' => $errors];
        $_SESSION['data'] = $post;

        if($errors == false && isset($_SESSION['data']) && $removeSession){
            unset($_SESSION['data']);
        }

        return $errors ? false : true;
    }

}