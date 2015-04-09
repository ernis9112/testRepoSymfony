<?php
/**
 * Created by PhpStorm.
 * User: Ernestas
 * Date: 2015-04-09
 * Time: 09:08
 */

namespace InfoGoal\KickerBundle\Model;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;

class ApiClientEvent extends Event
{

    public function onQueryBefore(GetResponseEvent $event)
    {
        $response = new Response();
        $response->setContent("On query before.");
        $event->setResponse($response);
    }

    public function onQuerySuccess(GetResponseEvent $event)
    {
        $response = new Response();
        $response->setContent("On query success.");
        $event->setResponse($response);
    }

    public function onQueryFail(GetResponseEvent $event)
    {
        $response = new Response();
        $response->setContent("On query fail.");
        $event->setResponse($response);
    }
} 