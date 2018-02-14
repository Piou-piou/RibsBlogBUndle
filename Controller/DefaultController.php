<?php

namespace PiouPiou\RibsBlogBundle\Controller;

use PiouPiou\RibsBlogBundle\Entity\Article;
use PiouPiou\RibsBlogBundle\Entity\State;
use PiouPiou\RibsBlogBundle\Form\EditArticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
	
	/**
	 * @Route("/create/", name="ribsadmin_blog_create")
	 * @Route("/edit/{url_article}", name="ribsadmin_blog_edit")
	 * @param string|null $url_article
	 * @return Response
	 */
	public function editAction(Request $request, string $url_article = null): Response
	{
		$em = $this->getDoctrine()->getManager();
		
		if ($url_article === null) {
			$article = new Article();
		} else {
			$article = new Article();
		}
		
		$form = $this->createForm(EditArticle::class, $article);
		
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			$em->persist($form->getData());
			$em->flush();
			
			$this->addFlash("success-flash", "Your article was correctly created");
			return $this->redirectToRoute('ribsadmin_blog_index');
		}
		
		return $this->render("@RibsBlog/admin/edit.html.twig", [
			"form" => $form->createView()
		]);
	}
}