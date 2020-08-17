<?php

namespace gaboeremita\quetzal;

class Quetzal
{

    /**
     * @param NewsletterInterface $newsletter
     * @param $listId
     * @param $contactEmail
     * @param $contactFirstName
     * @param $contactLastName
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function addContactToList(NewsletterInterface $newsletter, $listId, $contactEmail, $contactFirstName, $contactLastName) {

        return $newsletter->addContactToList(new Contact($contactEmail, $contactFirstName, $contactLastName), $listId);

    }

    /**
     * @param NewsletterInterface $newsletter
     * @param $name
     * @return MailingList
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function createList(NewsletterInterface $newsletter, $name) {

        return $newsletter->createList($name);

    }

    /**
     * @param NewsletterInterface $newsletter
     * @param $listId
     * @return \Illuminate\Support\Collection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getContactsFromList(NewsletterInterface $newsletter, $listId) {

        return $newsletter->getListContacts($listId);

    }
}