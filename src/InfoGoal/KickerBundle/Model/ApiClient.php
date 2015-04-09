<?php
/**
 * Created by PhpStorm.
 * User: Ernestas
 * Date: 2015-04-08
 * Time: 22:21
 */

namespace InfoGoal\KickerBundle\Model;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Guzzle\Http\Client;

class ApiClient
{

    protected $client;

    protected $baseUrl = "http://nfq:labas@wonderwall.ox.nfq.lt/kickertable/api/v1";

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    public function execute()
    {
        $event = new ApiClientEvent();
        $dispatcher = new EventDispatcher();

        $dispatcher->dispatch('api.query_before', $event);

        $client = $this->client;
        if (is_null($client))
            $client = new Client();

        $client->setBaseUrl($this->baseUrl);

        $request = $client->get('events?rows=100&from-id=180000');

        try {
            $response = $request->send();
            if ($response)
                $dispatcher->dispatch('api.query_success', $event);
        } catch (Exception $e) {
            $dispatcher->dispatch('api.query_fail', $event);
        }
    }
} 