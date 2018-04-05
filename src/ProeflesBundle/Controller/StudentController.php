<?php

namespace ProeflesBundle\Controller;

use ProeflesBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Student controller.
 *
 * @Route("students")
 */
class StudentController extends Controller
{
    /**
     * Lists all student entities.
     *
     * @Route("/", name="students_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $students = $em->getRepository('ProeflesBundle:Student')->findAll();

        return $this->render('students/index.html.twig', array(
            'students' => $students,
        ));
    }

    /**
     * Creates a new student entity.
     *
     * @Route("/new", name="students_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $student = new Student();
        $form = $this->createForm('ProeflesBundle\Form\StudentsType', $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush($student);

            return $this->redirectToRoute('students_show', array('id' => $student->getId()));
        }

        return $this->render('students/new.html.twig', array(
            'student' => $student,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a student entity.
     *
     * @Route("/{id}", name="students_show")
     * @Method("GET")
     */
    public function showAction(Student $student)
    {
        $deleteForm = $this->createDeleteForm($student);

        return $this->render('students/show.html.twig', array(
            'student' => $student,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing student entity.
     *
     * @Route("/{id}/edit", name="students_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Student $student)
    {
        $deleteForm = $this->createDeleteForm($student);
        $editForm = $this->createForm('ProeflesBundle\Form\StudentsType', $student);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('students_edit', array('id' => $student->getId()));
        }

        return $this->render('students/edit.html.twig', array(
            'student' => $student,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a student entity.
     *
     * @Route("/{id}", name="students_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Student $student)
    {
        $form = $this->createDeleteForm($student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($student);
            $em->flush($student);
        }

        return $this->redirectToRoute('students_index');
    }

    /**
     * Creates a form to delete a student entity.
     *
     * @param Student $student The student entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Student $student)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('students_delete', array('id' => $student->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
