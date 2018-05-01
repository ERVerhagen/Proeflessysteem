<?php

namespace ProeflesBundle\Controller;

use Symfony\Component\HttpFoundation\File\File;
use ProeflesBundle\Entity\locatie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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

        $locaties = $em->getRepository('ProeflesBundle:locatie')->findBy(['actief' => true]);


        return $this->render('locatie/index.html.twig', array(
            'locaties' => $locaties,
        ));
    }

    /**
     * Lists all locatie entities.
     *
     * @Route("/active/{id}", name="locatie_actief")
     * @Method("GET")
     */
    public function activeAction(locatie $locatie)
    {
        if ($locatie->isActief()) {
            $locatie->setActief(false);

        } else {
            $locatie->setActief(true);
        }
        $this->getDoctrine()->getManager()->flush();
        $em = $this->getDoctrine()->getManager();

        $locaties = $em->getRepository('ProeflesBundle:locatie')->findBy(['actief' => true]);
        return $this->render('locatie/index.html.twig', array(
            'locaties' => $locaties,
            'melding' => 'KIJK UIT u heeft de actiefstatus veranderd',
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

            $file = $locatie->getImg();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );

            $locatie->setImg($fileName);
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
            $locatie->setImg(
                new File($locatie->getImg())
            );
            // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $locatie->getImg();

            /*            if ($file) {
                            unlink($file);
                        }*/
            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $locatie->setImg($fileName);
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
            ->getForm();
    }
}