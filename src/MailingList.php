<?php

namespace gaboeremita\quetzal;

class MailingList
{
    public $id;
    private $name;
    private $status;

    CONST ACTIVE = 'ACTIVE';
    CONST ENDPOINT = 'lists';

    /**
     * MailingList constructor.
     * @param $id
     * @param $name
     * @param $status
     */
    public function __construct($id, $name, $status = 'ACTIVE')
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
    }
}