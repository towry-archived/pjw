<?php

class PJ_Event
{
    private $listeners = array();

    public function listen( $key, $cb ) 
    {
        if ( !isset( $this->listeners[$key] ) ) {
            $this->listeners[$key] = array();
        }
        $this->listeners[$key][] = $cb;
    }

    public function trigger( $key, $data = array() )
    {
        if ( !isset($this->listeners[$key]) ) {
            return;
        }

        $cbs = $this->listeners[$key];

        foreach ( $cbs as $cb ) {
            call_user_func_array( $cb, $data );
        }
    }

    public function remove( $key, $cb = null )
    {
        if ( !isset($this->listeners[$key]) ) {
            return;
        }

        if ( $cb == null ) {
            unset($this->listeners[$key]);
        } else {
            $cbs = $this->listeners[$key];
            unset($cbs[$cb]);
        }
    }
}
