<?php
namespace App\Controller;

use Jobs;
use App\Utils\JobsImporter;
use JobService;

class JobController
{
    private $services;
    public function __Construct(){
        $this->services["jobs"] = new JobService();
        $this->importer = new JobsImporter();
    }

    public function import(){

        $jobs = array();

        $count = count($jobs);
        if ($count > 0)
        {
            $this->services["jobs"]->delete();
            $this->services["jobs"]->insert($jobs);
        }
        return ($this->services["jobs"]->count());


    }

    public function fetch()
    {
        return $jobs = $this->services["jobs"]->getAll();
    }

}
