<?php

namespace PiouPiou\RibsBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends Controller {
	/**
	 * @Route("/index/", name="ribsadmin_blog_index")
	 * @return Response
	 */
	public function indexAction(): Response {
		return new Response("test blog ok");
	}
}