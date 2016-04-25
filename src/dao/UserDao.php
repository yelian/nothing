<?php

include_once '../CommonDao.php';
class UserDao extends CommonDao {
    private static $_this = null;
    
    public static function getInstance(){
        if(is_null(UserDao::$_this)) {
            UserDao::$_this = new UserDao();
        }
        return UserDao::$_this;
    }
}