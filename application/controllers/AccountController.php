<?php

namespace App\controllers;

use App\core\Controller;
use App\core\View;
use App\lib\Pagination;

class AccountController extends Controller {

    public function loginAction() {
        if (!empty($_POST)) {
            $validated = $this->model->validateRules($_POST,false);
            if($validated){
                if($this->model->checkData($_POST['login'], $_POST['password'])){
                    $this->model->login($_POST['login']);
                    $this->view->redirect('/account/profile');
                }
                $_SESSION['flash'] = ['errors' => ['Login or password is wrong']];
            }
        }
        $this->view->render('Вход');
    }

    public function checkData($login, $password) {
        $params = [
            'login' => $login,
        ];
        $hash = $this->db->column('SELECT password FROM accounts WHERE login = :login', $params);
        if (!$hash or !password_verify($password, $hash)) {
            return false;
        }
        return true;
    }

	public function registerAction() {
		$this->view->render('Регистрация');
	}

    public function profileAction() {

        if (isset($_SESSION['account']['id'])) {
            $pagination = new Pagination($this->route, $this->model->taskCount());
            $vars = [
                'pagination' => $pagination->get(),
                'list' => $this->model->taskList($this->route),
            ];
            $this->view->render('Админка',$vars);
		}else{
            $this->view->redirect('/account/login');
        }
    }
    public function editAction() {
        if (isset($_SESSION['account']['id'])) {
            $task = $this->model->getTask($this->route['id']);
            if(empty($task))  View::errorCode(404);
            $vars = [
                'task' => $task
            ];
            $this->view->render('Редактировать',$vars);
            $_SESSION['flash'] = ['success' => ['Task updated successfully']];
        }else{
            $this->view->redirect('/account/login');
        }
    }
    public function updateAction() {
        if (isset($_SESSION['account']['id'])) {
            $this->model->updateTask($this->route['id'],$_POST);
            $this->view->redirect('/account/edit/'.$this->route['id']);
        }else{
            $this->view->redirect('/account/login');
        }
    }

    public function logoutAction() {
        unset($_SESSION['account']);
        $this->view->redirect('/account/login');
    }

}