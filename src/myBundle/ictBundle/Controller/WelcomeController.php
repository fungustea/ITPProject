<?php
namespace myBundle\ictBundle\Controller;

use myBundle\ictBundle\Entity\career;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
	public function welcomeAction()
	{

		return $this->render('myBundleictBundle:Default:index.html.twig');
	}

}