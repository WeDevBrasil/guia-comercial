<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Entity\Advertisement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Advertisement controller.
 *
 * @Route("anuncio")
 */
class AdvertisementController extends Controller
{
    /**
     * Finds and displays a advertisement entity.
     *
     * @Route("/{id}", name="advertisement_view")
     * @Method("GET")
     */
    public function showAction(Advertisement $advertisement)
    {
        $em = $this->getDoctrine()->getManager();
    
        $categories = $em->getRepository('AppBundle:Category')->findAll();

        return $this->render('frontend/advertisement/show.html.twig', array(
            'categories' => $categories,
            'advertisement' => $advertisement,
        ));
    }
    
}
