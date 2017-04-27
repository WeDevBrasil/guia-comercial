<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Contacttype controller.
 *
 * @Route("dashboard/contacttype")
 */
class ContactTypeController extends Controller
{
    /**
     * Lists all contactType entities.
     *
     * @Route("/", name="contacttype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contactTypes = $em->getRepository('AppBundle:ContactType')->findAll();

        return $this->render('dashboard/contacttype/index.html.twig', array(
            'contactTypes' => $contactTypes,
        ));
    }

    /**
     * Creates a new contactType entity.
     *
     * @Route("/new", name="contacttype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contactType = new Contacttype();
        $form = $this->createForm('AppBundle\Form\ContactTypeType', $contactType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactType);
            $em->flush($contactType);

            return $this->redirectToRoute('contacttype_show', array('id' => $contactType->getId()));
        }

        return $this->render('dashboard/contacttype/new.html.twig', array(
            'contactType' => $contactType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a contactType entity.
     *
     * @Route("/{id}", name="contacttype_show")
     * @Method("GET")
     */
    public function showAction(ContactType $contactType)
    {
        $deleteForm = $this->createDeleteForm($contactType);

        return $this->render('dashboard/contacttype/show.html.twig', array(
            'contactType' => $contactType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contactType entity.
     *
     * @Route("/{id}/edit", name="contacttype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ContactType $contactType)
    {
        $deleteForm = $this->createDeleteForm($contactType);
        $editForm = $this->createForm('AppBundle\Form\ContactTypeType', $contactType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contacttype_edit', array('id' => $contactType->getId()));
        }

        return $this->render('dashboard/contacttype/edit.html.twig', array(
            'contactType' => $contactType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contactType entity.
     *
     * @Route("/{id}", name="contacttype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ContactType $contactType)
    {
        $form = $this->createDeleteForm($contactType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contactType);
            $em->flush();
        }

        return $this->redirectToRoute('contacttype_index');
    }

    /**
     * Creates a form to delete a contactType entity.
     *
     * @param ContactType $contactType The contactType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContactType $contactType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contacttype_delete', array('id' => $contactType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
