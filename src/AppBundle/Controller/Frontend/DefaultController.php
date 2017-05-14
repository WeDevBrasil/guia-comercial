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
        $tags = $em->getRepository('AppBundle:Tag')->findAll();
    
        $em = $this->getDoctrine()->getManager();
    
        $dql   = 'SELECT a FROM AppBundle:Advertisement a WHERE a.status=1';
        $query = $em->createQuery($dql);
    
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );
    
        return $this->render('frontend/default/index.html.twig', array(
            'categories' => $categories,
            'tags' => $tags,
            'pagination' => $pagination
        ));
    }
}
