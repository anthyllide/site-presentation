<?php
/**
 * Created by PhpStorm.
 * User: jiyou
 * Date: 02/01/2018
 * Time: 19:38
 */

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;




class DefaultController extends Controller
{
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function indexAction(){
        return $this->render('home.html.twig');
    }

    public function mentionsAction(){
    	return $this->render('mentions-legales.html.twig');
    }

}