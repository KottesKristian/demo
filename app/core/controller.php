<?php

class Controller
{

    protected $model = null;
    protected $title = null;
    protected $view = null;
    protected $registry = array();
    protected $data = array();

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setView($view = null, $data = null)
    {
        if ($view === null) {
            $view = debug_backtrace()[1]['function'];
        }
        if (strpos($view, 'Action') > 0) {
            $view = substr($view, 0, strpos($view, 'Action'));
        }
        if ($data != null) {
            $this->data = $data;
        }
        $this->view = $view;
    }

    public function getView()
    {
        return $this->view === null ? '404' : $this->view;
    }

    public function renderPartialview($view_name)
    {
        $view_path = ROOT . '/app/layouts/' . $view_name . '.php';
        if (file_exists($view_path)) {
            include $view_path;
        }


    }

    public function renderView()
    {
        if ($this->getView() === "404") {
            $class_name = "ErrorController";
        } else {
            $class_name = get_called_class();
        }
        $controller = substr($class_name, 0, strpos($class_name, 'Controller'));
        $view_path = ROOT . '/app/views/' . strtolower($controller) . '/' . strtolower($this->getView()) . '.php';
        if (file_exists($view_path)) {
            include $view_path;
        }
    }

    public function renderLayout($layout = "layout")
    {
        if (file_exists(ROOT . '/app/layouts/' . $layout . '.php')) {
            include ROOT . '/app/layouts/' . $layout . '.php';
        }
    }

    function __call($name, $args)
    {
        $this->setView('404');
        $this->renderLayout('layout_404');
    }

    public function getModel($name)
    {
        $model = new $name();
        return $model;
    }

    public function checkCaptcha()
    {
        $secret = "6Len90cUAAAAAOxHf7QO69Yx1L4zCN_3Gp-HzAJJ";
        $response = null;
        $reCaptcha = new ReCaptcha($secret);
        $checked = true;

        if (filter_input(INPUT_POST, 'g-recaptcha-response')) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
            if ($response !== null && $response->success) {
                $checked = true;
            } else {
                $checked = false;
            }
        } else {
            $checked = false;
        }
        return $checked;
    }
}