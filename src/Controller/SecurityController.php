<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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
 * @Route("/logout", name="security_logout")
 */
 public function logout()
 {
    return $this->render('base.html.twig');
 }
}
