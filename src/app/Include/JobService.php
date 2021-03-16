<?php

use App\Utils\PDODataBase;

class JobService
{
    private $dao;

    // constructer
    public function __construct()
    {
        // Singleton -> PDODataBase est une base de donnée qu'on va instancié une seule fois
        // instance unique
        $this->dao = PDODataBase::getInstance();
    }

    // view all jobs
    public function getAllJobs(){
        return $jobs = $this->dao->db->query('SELECT id, reference, title,
            description, url, company_name,
            publication FROM job')->fetchAll(PDO::FETCH_ASSOC);
    }


    // insert job into DB
    public function insert($jobs){
        try
        {
            $stmt = $this->dao->db->prepare('INSERT INTO job (reference,
                title, description, url, company_name, 
                publication) VALUES (?, ?, ?, ?, ?, ?)');
            $this->dao->db->beginTransaction();
            foreach ($jobs as $job)
            {
                $stmt->bindValue(1, $job->getReference());
                $stmt->bindValue(2, $job->getTitle());
                $stmt->bindValue(3, $job->getDescription());
                $stmt->bindValue(4, $job->getLink());
                $stmt->bindValue(5, $job->getCompanyName());
                $stmt->bindValue(6, $job->getPublishedDate());
                $exec = $stmt->execute();
            }
            $this->dao->db->commit();
        } catch (Exception $e)
        {
            echo $e->getMessage();
        }
        return ($exec);


    }

    // delete job
    public function delete(){
        $this->dao->db->exec('DELETE FROM job');
    }

    // count jobs
    public function count(){

        $count = $this->dao->db->query('SELECT COUNT(*) FROM job');
        return $count-> fetchColumn;

    }

}
