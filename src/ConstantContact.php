<?php


namespace gaboeremita\quetzal;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\GuzzleException;

class ConstantContact implements NewsletterInterface
{

    const ACTION = 'ACTION_BY_OWNER';

    private $emailingApiKey;
    private $emailingToken;
    private $client;
    private $header;
    private $query;

    public function __construct()
    {

        $baseUrl = config('quetzal.constant_contact.base_url');
        $this->emailingApiKey = config('quetzal.constant_contact.api_key');
        $this->emailingToken = config('quetzal.constant_contact.token');
        $this->client = new Client(['base_uri' => $baseUrl]);
        $this->header = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->emailingToken
        ];
        $this->query = [
            'api_key' => $this->emailingApiKey
        ];

    }

    /**
     * @param Contact $contact
     * @param $listId
     * @return bool
     * @throws GuzzleException
     */
    public function addContactToList(Contact $contact, $listId)
    {

        $arrayBody = [
            'email_addresses' => [
                [ 'email_address' => $contact->email ]
            ],
            'first_name' => $contact->firstName,
            'last_name' => $contact->lastName,
            'lists' => [
                [ 'id' => $listId ]
            ]
        ];

        $header = $this->header;

        $header['action_by'] = self::ACTION;

        $request = new Request('POST', Contact::ENDPOINT, $header, json_encode($arrayBody));

        $response = $this->client->send($request, [ 'query' => $this->query ]);

        return $response->getReasonPhrase() == 'Created';

    }

    /**
     * @param $name
     * @return MailingList
     * @throws GuzzleException
     */
    public function createList($name) {

        $arrayBody = [
            'name' => $name,
            'status' => MailingList::ACTIVE
        ];

        $request = new Request('POST', MailingList::ENDPOINT, $this->header, json_encode($arrayBody));

        $response = $this->client->send($request, [ 'query' => $this->query ]);

        if($response->getReasonPhrase() == 'Created') {

            $body = $response->getBody();

            $contents = json_decode($body->getContents(), true);

            return new MailingList($contents['id'], $contents['name'], $contents['status']);

        }

        return null;

    }

    /**
     * @param $listId
     * @return \Illuminate\Support\Collection
     * @throws GuzzleException
     */
    public function getListContacts($listId) {


        $request = new Request('GET', MailingList::ENDPOINT . '/' . $listId . '/' . Contact::ENDPOINT, $this->header);

        $response = $this->client->send($request, [ 'query' => $this->query ]);

        if($response->getStatusCode() == 200) {

            $body = $response->getBody();

            $contents = json_decode($body->getContents(), true);

            $results = $contents['results'];

            $contacts = collect();

            foreach ($results as $result) {

                $emailAddress = $result['email_addresses'][0]['email_address'];

                $contact = new Contact($emailAddress, $result['first_name'], $result['last_name']);

                $contacts->push($contact);

            }

            return $contacts;

        }

        return null;

    }
}