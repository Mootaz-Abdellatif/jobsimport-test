<?php


class Jobs
{
    private	$link;
    private	$title;
    private	$description;
    private	$reference;
    private	$published_date;
    private	$company_name;

    public function __construct($link, $title, $description, $reference, $published_date, $company_name)
    {
        $this->link = $link;
        $this->title = $title;
        $this->description = $description;
        $this->reference = $reference;
        $this->published_date = $published_date;
        $this->company_name = $company_name;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return mixed
     */
    public function getPublishedDate()
    {
        return $this->published_date;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }


}
