<?php
namespace App\Controller;

use App\Entity\Participant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RegisterType;



class SecurityController extends AbstractController
{

        /**
         * @Route(path="/login", name="security_login")
         */
        public function loginAction(AuthenticationUtils $authUtils)
        {
            $error = $authUtils->getLastAuthenticationError();
            $lastUsername = $authUtils->getLastUsername();
     
     
            return $this->render('security/login.html.twig', array(
                'last_username' => $lastUsername,
                'error'         => $error,
            ));
        }
    
   /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout(): void
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }

      /**
     * @Route("/register", name="register")
     */
    public function register(Request $request): Response
    {
        $participant = new Participant();
        $form=$this->createForm(RegisterType::class, $participant);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($participant);
            $em->flush();  
            return $this->redirectToRoute("home");
        }
        return $this->render('security/register.html.twig', [
            'monForm' => $form->createView(),
        ]);
    }
}
