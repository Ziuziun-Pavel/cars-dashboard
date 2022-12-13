<?php

namespace app\core;
use config\DB;

class Model
{
    protected $db = null;
    public $dbconnect;

    public function __construct()
    {
        $this->db = new DB();
        $this->dbconnect = $this->db->getConnection();
    }
}
