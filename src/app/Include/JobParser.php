<?php
namespace App\Utils;

use Job;

class JobParser
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
            $models[] = new Job(
                $item->link,
                $item->title,
                $item->description,
                $item->reference,
                $item->publisheddate,
                $item->companyname
            );
        }
        return ($models);
    }

    // regionjob.xml import
    function importFromRegionsjobXML($filename)
    {
        $models = array();
        if (!file_exists($filename))
            throw new \Exception($filename . " is an invalid file.");
        $xml = simplexml_load_file($filename);
        foreach ($xml->offer as $item)
        {
            $models[] = new Job(
                $item->link,
                $item->title,
                $item->description,
                $item->reference,
                $item->publisheddate,
                $item->companyname
            );
        }
        return ($models);
    }


}
