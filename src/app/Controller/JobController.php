<?php
namespace App\Controller;

use Jobs;
use App\Utils\JobsImporter;

class JobController
{
    private $services;
    public function __Construct(){
        $this->importer = new JobsImporter();
    }

    public function import(){



    }

    public function fetch()
    {
        return $jobs = $this->services["jobs"]->getAll();;
    }

}
