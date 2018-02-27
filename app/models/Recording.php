<?php

class Recording extends Model
{

    function __construct()
    {
        $this->table_name = "recordings";
        $this->id_column = "id";
    }

    public function listRecording()
    {
        return $this->initCollection()->sort($this->getSortParams())
            ->getCollection()->select();
    }


    public function addRecording($values)
    {
        $reg = "/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/";
        if (preg_match($reg, $values['email'])) {
            $values['created_at'] = date("Y-m-d H:i:s");
            $this->addItem($values);
        }
    }

    public function editRecording($id)
    {
        if ($id) {
            $values = $this->getPostValues();
            $this->registry['saved'] = 1;
            $this->saveItem($id, $values);
            return true;
        }
    }

    public function getSortParams()
    {
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            $params = [];
            $sort = filter_input(INPUT_POST, 'sortfirst');
            if ($sort === "date_DESC") {
                $params = [];
                $params['created_at'] = 'DESC';
            } elseif ($sort === "date_ASC") {
                $params = [];
                $params['created_at'] = 'ASC';
            } elseif ($sort === "name_DESC") {
                $params = [];
                $params['name'] = 'DESC';
            } elseif ($sort === "name_ASC") {
                $params = [];
                $params['name'] = 'ASC';
            } elseif ($sort === "email_DESC") {
                $params = [];
                $params['email'] = 'DESC';
            } elseif ($sort === "email_ASC") {
                $params = [];
                $params['email'] = 'ASC';
            }

            setcookie("sort", serialize($params), time() + 3600 * 24 * 30, "/", "", 0, 1);
            return $params;
        } else {
            $params['created_at'] = 'DESC';
            setcookie("sort", serialize($params), time() + 3600 * 24 * 30, "/", "", 0, 1);
            return $params;
        }
        if (isset($_COOKIE['sort'])) {
            $params = unserialize($_COOKIE['sort']);
            return $params;
        }
    }

}
