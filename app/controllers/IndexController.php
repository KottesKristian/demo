<?php

class IndexController extends Controller
{

    public function __construct()
    {
        $this->model = $this->getModel('Recording');
    }

    public function IndexAction()
    {
        $this->setTitle("Recording");
        $model = $this->model;
        $this->data['recordings'] = $model->listRecording();
        $this->registry['params'] = $model->getSortParams();
        $this->setView();
        $this->renderLayout();
    }
}