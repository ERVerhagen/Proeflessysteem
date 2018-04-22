<?php

namespace ProeflesBundle\Controller;

use ProeflesBundle\Entity\lessen;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lessen controller.
 *
 * @Route("lessen")
 */
class lessenController extends Controller
{
    /**
     * Lists all lessen entities.
     *
     * @Route("/", name="lessen_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lessens = $em->getRepository('ProeflesBundle:lessen')->findAll();

        return $this->render('lessen/index.html.twig', array(
            'lessens' => $lessens,
        ));
    }

    /**
     * Creates a new lessen entity.
     *
     * @Route("/new", name="lessen_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lessen = new Lessen();
        $form = $this->createForm('ProeflesBundle\Form\lessenType', $lessen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lessen);
            $em->flush();

            return $this->redirectToRoute('lessen_show', array('id' => $lessen->getId()));
        }

        return $this->render('lessen/new.html.twig', array(
            'lessen' => $lessen,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lessen entity.
     *
     * @Route("/{id}", name="lessen_show")
     * @Method("GET")
     */
    public function showAction(lessen $lessen)
    {
        $deleteForm = $this->createDeleteForm($lessen);

        return $this->render('lessen/show.html.twig', array(
            'lessen' => $lessen,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lessen entity.
     *
     * @Route("/{id}/edit", name="lessen_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, lessen $lessen)
    {
        $deleteForm = $this->createDeleteForm($lessen);
        $editForm = $this->createForm('ProeflesBundle\Form\lessenType', $lessen);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lessen_edit', array('id' => $lessen->getId()));
        }

        return $this->render('lessen/edit.html.twig', array(
            'lessen' => $lessen,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lessen entity.
     *
     * @Route("/{id}", name="lessen_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, lessen $lessen)
    {
        $form = $this->createDeleteForm($lessen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lessen);
            $em->flush();
        }

        return $this->redirectToRoute('lessen_index');
    }

    /**
     * Creates a form to delete a lessen entity.
     *
     * @param lessen $lessen The lessen entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(lessen $lessen)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lessen_delete', array('id' => $lessen->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
