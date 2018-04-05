<?php

namespace ProeflesBundle\Controller;

use ProeflesBundle\Entity\Lesson;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lesson controller.
 *
 * @Route("lessons")
 */
class LessonController extends Controller
{
    /**
     * Lists all lesson entities.
     *
     * @Route("/", name="lessons_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lessons = $em->getRepository('ProeflesBundle:Lesson')->findAll();

        return $this->render('lessons/index.html.twig', array(
            'lessons' => $lessons,
        ));
    }

    /**
     * Creates a new lesson entity.
     *
     * @Route("/new", name="lessons_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lesson = new Lesson();
        $form = $this->createForm('ProeflesBundle\Form\LessonsType', $lesson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lesson);
            $em->flush($lesson);

            return $this->redirectToRoute('lessons_show', array('id' => $lesson->getId()));
        }

        return $this->render('lessons/new.html.twig', array(
            'lesson' => $lesson,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lesson entity.
     *
     * @Route("/{id}", name="lessons_show")
     * @Method("GET")
     */
    public function showAction(Lesson $lesson)
    {
        $deleteForm = $this->createDeleteForm($lesson);

        return $this->render('lessons/show.html.twig', array(
            'lesson' => $lesson,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lesson entity.
     *
     * @Route("/{id}/edit", name="lessons_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lesson $lesson)
    {
        $deleteForm = $this->createDeleteForm($lesson);
        $editForm = $this->createForm('ProeflesBundle\Form\LessonsType', $lesson);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lessons_edit', array('id' => $lesson->getId()));
        }

        return $this->render('lessons/edit.html.twig', array(
            'lesson' => $lesson,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lesson entity.
     *
     * @Route("/{id}", name="lessons_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lesson $lesson)
    {
        $form = $this->createDeleteForm($lesson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lesson);
            $em->flush($lesson);
        }

        return $this->redirectToRoute('lessons_index');
    }

    /**
     * Creates a form to delete a lesson entity.
     *
     * @param Lesson $lesson The lesson entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lesson $lesson)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lessons_delete', array('id' => $lesson->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
