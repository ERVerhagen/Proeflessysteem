<?php

namespace ProeflesBundle\Controller;

use ProeflesBundle\Entity\inschrijving;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Inschrijving controller.
 *
 * @Route("inschrijving")
 */
class inschrijvingController extends Controller
{
    /**
     * Lists all inschrijving entities.
     *
     * @Route("/", name="inschrijving_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $inschrijvings = $em->getRepository('ProeflesBundle:inschrijving')->findAll();

        return $this->render('inschrijving/index.html.twig', array(
            'inschrijvings' => $inschrijvings,
        ));
    }
    /**
     * Lists all inschrijving entities.
     *
     * @Route("/active/{id}", name="inschrijving_actief")
     * @Method("GET")
     */
    public function activeAction(inschrijving $inschrijving)
    {
        if ($inschrijving->isActief()) {
            $inschrijving->setActief(false);

        } else {
            $inschrijving->setActief(true);
        }
        $this->getDoctrine()->getManager()->flush();
        $em = $this->getDoctrine()->getManager();

        $inschrijving = $em->getRepository('ProeflesBundle:inschrijving')->findBy(['actief' => true]);
        return $this->render('inschrijving/index.html.twig', array(
            'inschrijvings' => $inschrijving,
            'melding' => 'KIJK UIT u heeft de actiefstatus veranderd',
        ));
    }
    /**
     * Creates a new inschrijving entity.
     *
     * @Route("/new", name="inschrijving_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $inschrijving = new Inschrijving();
        $form = $this->createForm('ProeflesBundle\Form\inschrijvingType', $inschrijving);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inschrijving);
            $em->flush();

            return $this->redirectToRoute('inschrijving_show', array('id' => $inschrijving->getId()));
        }

        return $this->render('inschrijving/new.html.twig', array(
            'inschrijving' => $inschrijving,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a inschrijving entity.
     *
     * @Route("/{id}", name="inschrijving_show")
     * @Method("GET")
     */
    public function showAction(inschrijving $inschrijving)
    {
        $deleteForm = $this->createDeleteForm($inschrijving);

        return $this->render('inschrijving/show.html.twig', array(
            'inschrijving' => $inschrijving,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing inschrijving entity.
     *
     * @Route("/{id}/edit", name="inschrijving_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, inschrijving $inschrijving)
    {
        $deleteForm = $this->createDeleteForm($inschrijving);
        $editForm = $this->createForm('ProeflesBundle\Form\inschrijvingType', $inschrijving);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inschrijving_edit', array('id' => $inschrijving->getId()));
        }

        return $this->render('inschrijving/edit.html.twig', array(
            'inschrijving' => $inschrijving,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a inschrijving entity.
     *
     * @Route("/{id}", name="inschrijving_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, inschrijving $inschrijving)
    {
        $form = $this->createDeleteForm($inschrijving);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($inschrijving);
            $em->flush();
        }

        return $this->redirectToRoute('inschrijving_index');
    }

    /**
     * Creates a form to delete a inschrijving entity.
     *
     * @param inschrijving $inschrijving The inschrijving entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(inschrijving $inschrijving)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('inschrijving_delete', array('id' => $inschrijving->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
