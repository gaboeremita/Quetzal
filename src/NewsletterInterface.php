<?php

namespace gaboeremita\quetzal;

use GuzzleHttp\Exception\GuzzleException;

interface NewsletterInterface
{

    /**
     * @param $name
     * @return MailingList
     * @throws GuzzleException
     */
    public function createList($name);

    /**
     * @param Contact $contact
     * @param $listId
     * @return bool
     * @throws GuzzleException
     */
    public function addContactToList(Contact $contact, $listId);

    /**
     * @param $listId
     * @return \Illuminate\Support\Collection
     * @throws GuzzleException
     */
    public function getListContacts($listId);

}
