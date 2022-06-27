<?php

namespace Core;

use PDO;

abstract class Model extends Database
{
    protected $_db;

    public function __construct()
    {
        $this->_db = new Database();
        parent::__construct();
    }

    abstract function setTable();
    abstract function fieldTable();

    public function getList()
    {
        $selectFiled = empty($this->fieldTable()) ? "*" : $this->fieldTable();
        $sql = "SELECT $selectFiled FROM " . $this->setTable();
        $query = $this->_db->query($sql);
        if (empty($query)) {
            return false;
        }
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first()
    {
        $selectFiled = empty($this->fieldTable()) ? "*" : $this->fieldTable();
        $sql = "SELECT $selectFiled FROM " . $this->setTable();
        $query = $this->_db->query($sql);
        if (empty($query)) {
            return false;
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}

