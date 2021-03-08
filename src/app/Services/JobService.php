<?php

use App\Utils\PDODataBase;

class JobService
{
    private $dao;

    public function __construct()
    {
        $this->dao = PDODataBase::getInstance();
    }

    public function getAllJobs(){
        return $jobs = $this->dao->db->query('SELECT id, reference, title, ' .
            'description, url, company_name, ' .
            'publication FROM job')->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert(){


    }

    public function delete(){
        $this->dao->db->exec('DELETE FROM job');
    }

    public function count(){

        $count = $this->dao->db->query('SELECT COUNT(*) FROM job');
        return $count-> fetchColumn;

    }

}
