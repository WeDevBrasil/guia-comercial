<?php

namespace AppBundle\Controller\Dashboard;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    /**
     * @Route("dashboard/", name="dashboard")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('dashboard/default/index.html.twig', [
            'base_dir' => dirname($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
