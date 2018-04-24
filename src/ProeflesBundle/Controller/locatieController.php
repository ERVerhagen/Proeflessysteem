<?php

namespace ProeflesBundle\Controller;

use ProeflesBundle\Entity\locatie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Locatie controller.
 *
 * @Route("locatie")
 */
class locatieController extends Controller
{
    /**
     * Lists all locatie entities.
     *
     * @Route("/", name="locatie_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $locaties = $em->getRepository('ProeflesBundle:locatie')->findAll();

        return $this->render('locatie/index.html.twig', array(
            'locaties' => $locaties,
        ));
    }

    /**
     * Creates a new locatie entity.
     *
     * @Route("/new", name="locatie_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $locatie = new Locatie();
        $form = $this->createForm('ProeflesBundle\Form\locatieType', $locatie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($locatie);
            $em->flush();

            return $this->redirectToRoute('locatie_show', array('id' => $locatie->getId()));
        }

        return $this->render('locatie/new.html.twig', array(
            'locatie' => $locatie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a locatie entity.
     *
     * @Route("/{id}", name="locatie_show")
     * @Method("GET")
     */
    public function showAction(locatie $locatie)
    {
        $deleteForm = $this->createDeleteForm($locatie);

        return $this->render('locatie/show.html.twig', array(
            'locatie' => $locatie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing locatie entity.
     *
     * @Route("/{id}/edit", name="locatie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, locatie $locatie)
    {
        $deleteForm = $this->createDeleteForm($locatie);
        $editForm = $this->createForm('ProeflesBundle\Form\locatieType', $locatie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('locatie_edit', array('id' => $locatie->getId()));
        }

        return $this->render('locatie/edit.html.twig', array(
            'locatie' => $locatie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a locatie entity.
     *
     * @Route("/{id}", name="locatie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, locatie $locatie)
    {
        $form = $this->createDeleteForm($locatie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($locatie);
            $em->flush();
        }

        return $this->redirectToRoute('locatie_index');
    }

    /**
     * Creates a form to delete a locatie entity.
     *
     * @param locatie $locatie The locatie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(locatie $locatie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('locatie_delete', array('id' => $locatie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
