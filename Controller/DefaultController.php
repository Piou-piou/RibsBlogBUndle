<?php

namespace PiouPiou\RibsBlogBundle\Controller;

use PiouPiou\RibsBlogBundle\Entity\Article;
use PiouPiou\RibsBlogBundle\Entity\State;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
	/**
	 * @Route("/index/", name="ribsadmin_blog_index")
	 * @return Response
	 */
	public function indexAction(): Response
	{
		$articles = $this->getDoctrine()->getManager()->getRepository(Article::class)->findBy([
			"state" => State::PUBLISHED
		]);
		
		return $this->render("@RibsBlog/admin/index.html.twig", ["articles" => $articles]);
	}
}