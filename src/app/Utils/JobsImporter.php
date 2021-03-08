<?php
namespace App\Utils;

use Jobs;

class JobsImporter
{

    // jobteaser.xml import
    function importJobteaserXML($filename)
    {
        $models = array();
        if (!file_exists($filename))
            throw new \Exception($filename . " is an invalid file.");
        $xml = simplexml_load_file($filename);
        foreach ($xml->offer as $item)
        {
            $models[] = new Jobs(
                addslashes($item->link),
                addslashes($item->title),
                addslashes($item->description),
                addslashes($item->reference),
                addslashes($item->publisheddate),
                addslashes($item->companyname)
            );
        }
        return ($models);
    }

    // regionjob.xml import
    function importFromJobteaserXML($filename)
    {
        $models = array();
        if (!file_exists($filename))
            throw new \Exception($filename . " is an invalid file.");
        $xml = simplexml_load_file($filename);
        foreach ($xml->offer as $item)
        {
            $models[] = new Jobs(
                addslashes($item->link),
                addslashes($item->title),
                addslashes($item->description),
                addslashes($item->reference),
                addslashes($item->publisheddate),
                addslashes($item->companyname)
            );
        }
        return ($models);
    }


}
