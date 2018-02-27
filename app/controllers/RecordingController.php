<?php

class RecordingController extends Controller
{

    public function __construct()
    {
        $this->model = $this->getModel('Recording');
    }

    public function addAction()
    {
        $this->registry['saved'] = 0;
        $model = $this->model;
        $captcha = $this->checkCaptcha();

        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            $values = $model->getPostValues();
            if (!empty($values['name']) && !empty($values['email']) && !empty($values['text']) && $captcha) {
                $model->addRecording($values);
                $this->registry['saved'] = 1;
            }
        }

        $this->setView();
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->registry['saved'] = 0;
        if (Helper::isAdmin()) {
            $model = $this->model;
            $id = filter_input(INPUT_POST, 'id');
            $result = $model->editRecording($id);
            $this->data = $model->getItem($this->getId());
            if ($result) {
                $this->registry['saved'] = 1;
            }
        } else {
            Helper::redirect('/user/login');
        }
        $this->setView();
        $this->renderLayout();
    }

    public function deleteAction()
    {
        $id = $this->getId();
        if (!empty($id)) {
            $this->model->deleteItem($id);
        }
        Helper::redirect('');
    }

    public function getId()
    {
        return filter_input(INPUT_GET, 'id');
    }
}
