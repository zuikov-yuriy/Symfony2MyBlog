<?php

namespace Vizitka\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;

class RegistrationController extends BaseController
{
    
    public function regAction() {  

       $form = $this->container->get('fos_user.registration.form');
        
       return $this->container->get('templating')->renderResponse('VizitkaUserBundle:Registration:test/reg.html.twig', array(
                     'csrf_token' => $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate'),
                    'form' => $form->createView(),
                         )); 
    }
    
   public function loginAction() {  

       $form = $this->container->get('fos_user.registration.form');
        
       return $this->container->get('templating')->renderResponse('VizitkaUserBundle:Registration:test/login.html.twig', array(
                    'csrf_token' => $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate'),
                    'form' => $form->createView(),
                         )); 
    }
    
    public function ajaxAction() {        
       return $this->container->get('templating')->renderResponse('VizitkaUserBundle:Registration:test/ajax.html.twig', array(
                    'name' => 'ТЕСТ',
     )); 
    
        
        
        
//        $userManager = $this->container->get('fos_user.user_manager');
//        $user = $userManager->findUserBy(array('username' => 'Yuriy'));
//        $user->setPlainPassword('admin');
//        $userManager->updateUser($user);
//        var_dump($user);
        
        
//
//        $form = $this->container->get('fos_user.registration.form');
//                    'f' => $form->createView()
//        
//        <form action="{{ path('fos_user_registration_register') }}" {{ form_enctype(f) }} method="POST" class="fos_user_registration_register">
//    {{ form_widget(f) }}
//    <div>
//        <input type="submit" value="{{ 'registration.submit'|trans({}, 'FOSUserBundle') }}" />
//    </div>
//</form>
    }

    
    
    public function registerAction()
    {
        $form = $this->container->get('fos_user.registration.form');
        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

        $process = $formHandler->process($confirmationEnabled);
        if ($process) {
            $user = $form->getData();

            $this->container->get('logger')->info(
                sprintf('New user registration: %s', $user)
            );

            if ($confirmationEnabled) {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                $route = 'fos_user_registration_check_email';
            } else {
                $this->authenticateUser($user);
                $route = 'fos_user_registration_confirmed';
            }

            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route);

            return new RedirectResponse($url);
        }

        return $this->container->get('templating')->renderResponse('VizitkaUserBundle:Registration:register.html.'.$this->getEngine(), array(
            'form' => $form->createView(),
        ));
    }
}