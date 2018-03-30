<?php

class aut {
    static $instance = null;
    protected $user_data;
    protected $salt = '';
    
    
    public function setSalt($salt) {
        $this->salt = $salt;
    }
    
    static public function getInstance() {
        if (empty(aut::$instance)) {
            aut::$instance = new aut();
        }
        
        return aut::$instance;
    }
    
    public function login($username, $password, $remember_me = false) {
        
        $user_username = trim($username);
        $user_password = trim(crypt($password, $this->salt));

        if (!empty($user_username) && !empty($user_password)) {

            $person = ORM::for_table('users')->where('username', $user_username)->find_one();
            if (!empty($person)) {
                $_SESSION['logged_user_id'] = $person->user_id;

                if (!empty($remember_me)) {
                    setcookie('username', $person->username, time() + 60 * 60 * 24 * 30);
                    setcookie('password', crypt($person->password, $this->salt), time() + 60 * 60 * 24 * 30);
                }
                
                $this->user_data = $user_data[0];
                
                return true;
            }
        }

        return false;
    }

    public function signup($username, $password) {

        $password = trim(crypt($password, $this->salt));

        $data = ORM::for_table('users')->where('username', $username)->find_array();


        if (empty($data)) {
            $person = ORM::for_table('users')->create();
            $person->username = $username;
            $person->password = $password;
            $person->save();

            return TRUE;
        }
        return FALSE;
    }

    public function logout() {
        unset($_SESSION['logged_user_id']);
        unset($_COOKIE['password']);
        unset($_COOKIE['username']);
        setcookie('password', '', -1, '/');
        setcookie('username', '', -1, '/');
    }
    
    
    public function checkLoggedUser() {
        
        if (!empty($_SESSION['logged_user_id'])) {
            
            $user_data = ORM::for_table('users')->where('user_id', $_SESSION['logged_user_id'])->find_array();
            $this->user_data = $user_data[0];
            
        } elseif (!empty($_COOKIE['username']) && !empty($_COOKIE['password'])) {

            $user_username = trim($_COOKIE['username']);
            $user_password = trim($_COOKIE['password']);

            $user_data = ORM::for_table('users')->where('username', $user_username)->find_array();
            $user_data = $user_data[0];
            
            if ($user_password == crypt($user_data['password'], $this->salt)) {
                $_SESSION['logged_user_id'] = $user_data['user_id'];
                $this->user_data = $user_data;
            }
        }
    }    
    
    public function getUserData() {
        return $this->user_data;
    }
}