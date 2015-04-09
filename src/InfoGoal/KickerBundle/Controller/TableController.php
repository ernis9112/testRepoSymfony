<?php

namespace InfoGoal\KickerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use InfoGoal\KickerBundle\Model\ApiClient;

class TableController extends Controller
{
    public function indexAction()
    {
        $api = new ApiClient();
        $api->execute();
        return $this->render('InfoGoalKickerBundle:Table:index.html.twig', array());
    }

}
