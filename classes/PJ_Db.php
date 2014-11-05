<?php

class PJ_Db
{
    private $prefix;
    private $db;
    private $table;

    public function __construct( $prefix = 'pj' )
    {
        $this->prefix = $prefix;
    }

    public function connect( $addr, $user, $pass )
    {
        $this->db = mysqli_connect( $addr, $user, $pass );
        if (! $this->db) {
            throw new Exception(mysqli_error($this->db), 1);
        }
        mysqli_select_db($this->db, DB_NAME);
    }

    public function close()
    {
        mysqli_close($this->db);
    }

    public function table( $table )
    {
        $table = $this->prefix . '_' . $table;

        $this->table = $table;

        return $this;
    }

    public function query($sql, $params = array())
    {
        try {
            $stmt = mysqli_prepare($this->db, $sql);
            mysqli_bind_param($stmt, $params);
        } catch (Exception $e) {
            if ($stmt != null) {
                mysqli_stmt_close($stmt);
            }
        }

        return mysqli_stmt_execute($stmt);
    }

    public function one($id)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE id={$id};";
        $res = mysqli_real_query($this->db, $sql);
        return $res;
    }

    public function alive()
    {
        if (!isset($this->db)) {
            return false;
        } elseif ($this->db) {
            return true;
        } else {
            return false;
        }
    }
}
