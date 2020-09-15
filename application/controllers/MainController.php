<?php

namespace App\controllers;



use App\core\Controller;

class MainController extends Controller {

	public function indexAction() {
		$result = $this->model->getTasks();
		$vars = [
			'tasks' => $result,
		];
		 $this->view->render('Главная страница', $vars);
	}

    public function createAction() {
        $this->view->render('Создать задачу');
    }

    public function saveAction() {
        $saved = $this->model->saveTask($_POST);

        if($saved){
            $_SESSION['flash'] = ['success' => ['Task created successfully']];

            $this->view->redirect('/');
        }

        $this->view->redirect('/task/create');

    }

}