<?php
/**
 * Created by PhpStorm.
 * User: jiyou
 * Date: 06/03/2018
 * Time: 18:59
 */

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    public function contactAction(Request $request, \Swift_Mailer $mailer){

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $dataForm = $form->getData();

                $first_name = $dataForm->getFirstName();
                $last_name = $dataForm->getLastName();
                $email = $dataForm->getEmail();
                $subject = $dataForm->getSubject();
                $message = $dataForm->getMessage();
                $messageContact = (new \Swift_Message('Formulaire de contact'))
                    ->setFrom ($email)
                    ->setTo('gonzalez.axa@wanadoo.fr')
                    ->setBody(
                        $this->renderView('email.html.twig',
                            array(
                                'first_name' => $first_name,
                                'last_name' => $last_name,
                                'email' => $email,
                                'subject' => $subject,
                                'message' => $message
                            )
                        ),
                        'text/html'
                    );

                $mailer->send($messageContact);
                return $this->render('success-email.html.twig');
            }

        }
        return $this->render('contact.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function successEmailAction(){
        return $this->render('success-email.html.twig');
    }


}