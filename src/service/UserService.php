<?php
include_once '../dao/UserDao.php';

class UserService {
    private static $_this = null;
    private $_userDao = null;
    
    public static function getInstance(){
        if(is_null(UserService::$_this)) {
            UserService::$_this = new UserService();
        }
        return UserService::$_this;
    }
    
    function insert($user){
        if(is_null($this->_userDao)) {
            $this->_userDao = $this->getUserDao();
        }
        $this->_userDao->insert($user);
    }
    
    function checkUserExist(){
        if(is_null($this->_userDao)) {
            $this->_userDao = $this->getUserDao();
        }
        $this->_userDao->insert();
    }
    
    function getUserDao(){
        return UserDao::getInstance();
    }
}