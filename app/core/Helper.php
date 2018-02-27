<?php

class Helper
{
    public static function getModel($name)
    {
        $model = new $name();
        return $model;
    }

    public static function getMenu()
    {
        return self::getModel('menu')->initCollection()
            ->sort(array('sort_order' => 'ASC'))->getCollection()->select();
    }

    public static function simpleLink($path, $name, $params = [])
    {
        if (!empty($params)) {
            $firts_key = array_keys($params)[0];
            foreach ($params as $key => $value) {
                $path .= ($key === $firts_key ? '?' : '&');
                $path .= "$key=$value";
            }
        }
        return '<a href="' . BP . $path . '">' . $name . '</a>';
    }

    public static function getUser()
    {
        if (!empty($_SESSION['id'])) {
            return self::getModel('user')->initCollection()
                ->filter(array('id' => $_SESSION['id']))
                ->getCollection()
                ->selectFirst();
        } else {
            return null;
        }

    }

    public static function redirect($path)
    {
        $server_host = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $url = $server_host . BP . $path;
        header("Location: $url");
    }

    public static function isAdmin()
    {
        if ($customer = Helper::getUser()) {
            $admin = $customer['admin_role'];
            if ($admin == 1) return true;
            else return false;
        } else return false;
    }
}
