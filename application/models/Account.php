<?php

namespace App\models;

use App\models\DbModel;

class Account extends DbModel
{
    public function getRules()
    {
        return [
            'login' => [
                'max_length' => 255,
                'require' => true,
                'messages' => [
                    'require' => 'Login field is required',
                    'max_length' => 'Password length must be less then 255',
                ]
            ],
            'password' => [
                'max_length' => 255,
                'require' => true,
                'pattern' => '/^[a-z0-9]{6,20}$/',
                'messages' => [
                    'max_length' => 'Password length must be less then 255',
                    'require' => 'Password field is required',
                ]
            ],
        ];
    }


    public function checkData($login, $password) {
        $params = [
            'login' => $login,
        ];
        $hash = $this->db->column('SELECT password FROM users WHERE login = :login', $params);
        if (!$hash or !password_verify($password, $hash)) {
            return false;
        }
        return true;
    }

	public function login($login) {
		$params = [
			'login' => $login,
		];
		$data = $this->db->row('SELECT * FROM users WHERE login = :login', $params);
		$_SESSION['account'] = $data[0];
	}

    public function taskCount() {
        return $this->db->column('SELECT COUNT(id) FROM tasks');
    }

    public function taskList($route) {
        $max = 3;
        $params = [
            'start' => ((($route['page'] ?? 1) - 1) * $max),
            'max' => $max,
        ];
        return $this->db->row("SELECT * FROM tasks ORDER BY id DESC LIMIT ".$params['start'].",".$params['max']);
    }

    public function getTask($id) {
        return $this->db->row("SELECT * FROM tasks WHERE id = $id");
    }

    public function updateTask($id,$post) {

        $status = isset($post['status']) ? $post['status'] : 0;
        return $this->db->row("UPDATE tasks SET status = '$status', text='".$post['text']."' WHERE id=$id");
    }

}