<?php
namespace ProeflesBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
/**
 * Signin controller.
 *
 * @Route("signin")
 */
class SigninController extends Controller
{
    /**
     * @Route("/", name="signin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $locations = $em->getRepository('ProeflesBundle:locatie')->findAll();
        $categorie = $em->getRepository('ProeflesBundle:categorie')->findAll();
        return $this->render('signin/index.html.twig', array(
            'locatie' => $locations,
            'categorie' => $categorie,
        ));
    }
}