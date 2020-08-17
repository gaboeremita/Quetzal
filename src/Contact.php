<?php

namespace gaboeremita\quetzal;

class Contact
{
    public $email;
    public $firstName;
    public $lastName;

    const ENDPOINT = 'contacts';

    /**
     * Contact constructor.
     * @param $email
     * @param $firstName
     * @param $lastName
     */
    public function __construct($email, $firstName, $lastName)
    {
        $this->email = $email;
        $this->lastName = $lastName;
        $this->firstName = $firstName;

    }

}