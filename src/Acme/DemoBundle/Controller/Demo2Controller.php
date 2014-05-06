<?php

namespace Acme\DemoBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\DemoBundle\Controller\MyTestController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class Demo2Controller extends MyTestController
{
    /**
     * @Route("/", name="_demo2")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/paint/{name}/{mainUser}", name="_demo2_paint")
     * @Template()
     */
    public function paintAction($name, $mainUser)
    {
        $this->data['mainUser']=$mainUser;
        $this->data['name']=$name;
        return $this->data;
    }

    /**
     * @Route("/sing/{name}", name="_demo2_sing")
     * @Template()
     */
    public function singAction($name)
    {
        // $this->data['mainUser']=$mainUser;
        $this->data['name']=$name;
        return $this->data;
    }
    
    /**
     * @Route("/contact", name="_demo2_contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $mailer = $this->get('mailer');

            // .. setup a message and send it
            // http://symfony.com/doc/current/cookbook/email.html

            $request->getSession()->getFlashBag()->set('notice', 'Message sent!');

            return new RedirectResponse($this->generateUrl('_demo'));
        }

        return array('form' => $form->createView());
    }
}
