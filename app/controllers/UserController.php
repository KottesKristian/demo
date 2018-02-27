<?php

class UserController extends Controller
{

    public function __construct()
    {
        $this->model = $this->getModel('User');
    }

    public function loginAction()
    {
        $this->setTitle("Вхід");
        $model = $this->model;

        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            $login = filter_input(INPUT_POST, 'login');
            $password = md5(filter_input(INPUT_POST, 'password'));
            $result = $model->login($login, $password);
            if (!$result) {
                $this->invalid_password = 1;
            }
        }
        if (Helper::isAdmin()) {
            Helper::redirect('');
        }

        $this->setView();
        $this->renderLayout();
    }

    public function logoutAction()
    {
        $_SESSION = [];

        if (!empty($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time() - 3600, "/");
        }
        session_destroy();
        Helper::redirect('');
    }

}
