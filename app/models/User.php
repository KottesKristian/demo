<?php

class User extends Model
{

    function __construct()
    {
        $this->table_name = "users";
        $this->id_column = "id";
    }

    public function login($login, $password)
    {
        $params = array(
            'login' => $login,
            'password' => $password
        );
        $user = $this->initCollection()
            ->filter($params)
            ->getCollection()
            ->selectFirst();
        if (!empty($user)) {
            $_SESSION['id'] = $user['id'];
        } else {
            return false;
        }
    }

}