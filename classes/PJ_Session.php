<?php

class PJ_Session
{
    private $started;

    public function start() 
    {
        if (isset($this->started) && $this->started) {
            return;
        } else {
            session_start();
        }
    }

    public function set( $key ,$value )
    {
        $_SESSION[$key] = $value;
    }

    public function get( $key )
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function remove( $key )
    {
        if (! isset($_SESSION[$key])) {
            return;
        }

        unset($_SESSION[$key]);
    }

    public function cookie( $name, $value = null, $exp = 31536000, $path = '/' )
    {
        if (func_num_args() == 1) {
            return (isset($_COOKIE[$name]) ? $_COOKIE[$name] : null);
        } else {
            setcookie($name, $value, time() + $exp, $path);
        }
    }
}
