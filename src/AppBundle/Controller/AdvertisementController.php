<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Advertisement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Advertisement controller.
 *
 * @Route("dashboard/advertisement")
 */
class AdvertisementController extends Controller
{
    /**
     * Lists all advertisement entities.
     *
     * @Route("/", name="advertisement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $advertisements = $em->getRepository('AppBundle:Advertisement')->findAll();

        return $this->render('dashboard/advertisement/index.html.twig', array(
            'advertisements' => $advertisements,
        ));
    }

    /**
     * Creates a new advertisement entity.
     *
     * @Route("/new", name="advertisement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $advertisement = new Advertisement();
        $form = $this->createForm('AppBundle\Form\AdvertisementType', $advertisement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($advertisement);
            $em->flush();

            return $this->redirectToRoute('advertisement_show', array('id' => $advertisement->getId()));
        }

        return $this->render('dashboard/advertisement/new.html.twig', array(
            'advertisement' => $advertisement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a advertisement entity.
     *
     * @Route("/{id}", name="advertisement_show")
     * @Method("GET")
     */
    public function showAction(Advertisement $advertisement)
    {
        $deleteForm = $this->createDeleteForm($advertisement);

        return $this->render('dashboard/advertisement/show.html.twig', array(
            'advertisement' => $advertisement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing advertisement entity.
     *
     * @Route("/{id}/edit", name="advertisement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Advertisement $advertisement)
    {
        $deleteForm = $this->createDeleteForm($advertisement);
        $editForm = $this->createForm('AppBundle\Form\AdvertisementType', $advertisement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('advertisement_edit', array('id' => $advertisement->getId()));
        }

        return $this->render('dashboard/advertisement/edit.html.twig', array(
            'advertisement' => $advertisement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a advertisement entity.
     *
     * @Route("/{id}", name="advertisement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Advertisement $advertisement)
    {
        $form = $this->createDeleteForm($advertisement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($advertisement);
            $em->flush();
        }

        return $this->redirectToRoute('advertisement_index');
    }

    /**
     * Creates a form to delete a advertisement entity.
     *
     * @param Advertisement $advertisement The advertisement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Advertisement $advertisement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('advertisement_delete', array('id' => $advertisement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
