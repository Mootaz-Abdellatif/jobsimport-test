<?php


/************************************
Entry point of the project.
To be run from the command line.
************************************/

namespace App;

use App\Utils;
use JobsImporter;
use JobsLister;
use App\Controller\JobController;

define('RESSOURCES_DIR', __DIR__ . '/../resources/');

// __autoload is deprecated
spl_autoload_register(function (string $classname) {

    include_once(__DIR__ . '/' . $classname . '.php');
});

class app{

    private $Jobscontroller;

    public function __construct(){
        $this->Jobscontroller["jobs"] = new JobController();
    }

    public function import(){

        echo sprintf("Starting...\n");


        /* import jobs */
        $count = $this->Jobscontroller["jobs"]->import(RESSOURCES_DIR);
        echo sprintf("> %d jobs imported.\n", $count);

        /* list jobs */
        $jobs = $this->Jobscontroller["jobs"]->fetch();
        echo sprintf("> all jobs (%d):\n", count($jobs));
        foreach ($jobs as $job) {
            echo sprintf(" %d: %s - %s - %s\n", $job['id'], $job['reference'], $job['title'], $job['publication']);
        }

        echo sprintf("Done.\n");

    }
}
