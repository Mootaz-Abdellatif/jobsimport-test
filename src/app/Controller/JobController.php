<?php
namespace App\Controller;

use Job;
use App\Utils\JobParser;
use JobService;

class JobController
{
    private $services;
    private $parser;

    public function __Construct(){
        /* instanciation */
        $this->services["jobs"] = new JobService();
        $this->parser = new JobParser();
    }

    public function import($directory)
    {
        $jobs = array();

        // Check if path is a valid directory.
        if (!is_dir($directory))
            throw new \Exception($directory . " is not a valid directory.");

        // Get all files in directory.
        $chdir = scandir($directory);
        foreach ($chdir as $key => $file)
        {
            $method_name = "importFrom";
            $format = "XML";
            if ($file != "." && $file != "..")
            {
                // Forge method name for importer from filename.
                $values = explode(".", $file);
                $filename = ucfirst($values[0]);
                $format = strtoupper($values[1]);
                $method_name = $method_name . $filename . $format;
                // Call the method if she exists, if not, throw an exception.
                if (method_exists($this->parser, $method_name))
                    $jobs = array_merge($this->parser->$method_name($directory . "/" . $file), $jobs);
                else
                    throw new \Exception("Unknown method in Importer class: " . $method_name . ".");
            }
        }

        $count = count($jobs);
        if ($count > 0)
        {
            $this->services["jobs"]->delete();
            $this->services["jobs"]->insert($jobs);
        }
        return ($this->services["jobs"]->count());


    }

    // afficher tous les jobs
    public function fetch()
    {
        return $jobs = $this->services["jobs"]->getAll();
    }

}
