<?php

namespace AppBundle\Controller\Dashboard;

use AppBundle\Entity\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Usertype controller.
 *
 * @Route("dashboard/usertype")
 */
class UserTypeController extends Controller
{
    /**
     * Lists all userType entities.
     *
     * @Route("/", name="usertype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $userTypes = $em->getRepository('AppBundle:UserType')->findAll();

        return $this->render('dashboard/usertype/index.html.twig', array(
            'userTypes' => $userTypes,
        ));
    }

    /**
     * Creates a new userType entity.
     *
     * @Route("/new", name="usertype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $userType = new Usertype();
        $form = $this->createForm('AppBundle\Form\UserTypeType', $userType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($userType);
            $em->flush();

            return $this->redirectToRoute('usertype_show', array('id' => $userType->getId()));
        }

        return $this->render('dashboard/usertype/new.html.twig', array(
            'userType' => $userType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a userType entity.
     *
     * @Route("/{id}", name="usertype_show")
     * @Method("GET")
     */
    public function showAction(UserType $userType)
    {
        $deleteForm = $this->createDeleteForm($userType);

        return $this->render('dashboard/usertype/show.html.twig', array(
            'userType' => $userType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing userType entity.
     *
     * @Route("/{id}/edit", name="usertype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, UserType $userType)
    {
        $deleteForm = $this->createDeleteForm($userType);
        $editForm = $this->createForm('AppBundle\Form\UserTypeType', $userType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usertype_edit', array('id' => $userType->getId()));
        }

        return $this->render('dashboard/usertype/edit.html.twig', array(
            'userType' => $userType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a userType entity.
     *
     * @Route("/{id}", name="usertype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, UserType $userType)
    {
        $form = $this->createDeleteForm($userType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($userType);
            $em->flush();
        }

        return $this->redirectToRoute('usertype_index');
    }

    /**
     * Creates a form to delete a userType entity.
     *
     * @param UserType $userType The userType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UserType $userType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usertype_delete', array('id' => $userType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
