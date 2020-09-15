<?php

namespace App\models;

use App\models\DbModel;

class Main extends DbModel {

    public function getRules()
    {
        return [
            'username' => [
                'max_length' => 255,
                'min_length' => 5,
                'require' => true,
                'type' => 'text',
                'messages' => [
                    'require' => 'Username field is required',
                    'min_length' => 'Username length must be more then 5',
                ]
            ],
            'email' => [
                'max_length' => 255,
                'require' => true,
                'type' => 'email',
                'messages' => [
                    'max_length' => 'Email length must be less then 255',
                    'require' => 'Email field is required',
                    'type' => 'Email field should be an email',
                ]
            ],
            'text' => [
                'require' => true,
                'type' => 'text',
                'messages' => [
                    'require' => 'Message field is required',
                ]
            ],
            'status' => [
                'type' => 'boolean',
                'safeField' => true,
            ],
        ];
    }

	public function getTasks()
    {
		$result = $this->db->row('SELECT * FROM tasks');

		return $result;
	}

    public function saveTask($post)
    {
        $validated = $this->validateRules($post);

        if($validated){
            $params = [
                'username' => $post['username'],
                'email' => $post['email'],
                'text' => $post['text'],
                'status' => 0,
            ];

            $this->db->query('INSERT INTO `tasks`(`username`, `email`, `text`, `status`) VALUES (:username, :email,  :text, :status)', $params);
        }
        return $validated;
    }

}