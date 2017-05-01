<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /*
        // replace this example code with whatever you need
        return $this->render('frontend/default/index.html.twig', [
            'base_dir' => dirname($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
        */
        
        $em = $this->getDoctrine()->getManager();
    
        $categories = $em->getRepository('AppBundle:Category')->findAll();
        $advertisement = $em->getRepository('AppBundle:Advertisement')->findAll();
    
        return $this->render('frontend/default/index.html.twig', array(
            'categories' => $categories,
            'advertisements' => $advertisement,
        ));
    }
}
