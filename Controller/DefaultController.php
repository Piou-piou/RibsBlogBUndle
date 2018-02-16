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
			"state" => Article::PUBLISHED,
		]);
		
		return $this->render("@RibsBlog/admin/index.html.twig", [
			"articles" => $articles,
			"navigation" => $this->getNavigation(),
		]);
	}
	
	/**
	 * @Route("/create/", name="ribsadmin_blog_create")
	 * @Route("/edit/{url}", name="ribsadmin_blog_edit")
	 * @param string|null $url
	 * @return Response
	 */
	public function editAction(Request $request, string $url = null): Response
	{
		$em = $this->getDoctrine()->getManager();
		
		if ($url === null) {
			$article = new Article();
			$edit = false;
		} else {
			$article = $em->getRepository(Article::class)->findOneBy(["url" => $url]);
			$edit = true;
		}
		
		$form = $this->createForm(EditArticle::class, $article);
		
		$form->handleRequest($request);
		
		if ($form->isSubmitted() && $form->isValid()) {
			$em->persist($form->getData());
			$em->flush();
			
			if ($edit === true) {
				$this->addFlash("success-flash", "Your article was correctly edited");
			} else {
				$this->addFlash("success-flash", "Your article was correctly created");
			}
			
			return $this->redirectToRoute('ribsadmin_blog_index');
		}
		
		return $this->render("@RibsBlog/admin/edit.html.twig", [
			"form" => $form->createView(),
			"navigation" => $this->getNavigation(),
		]);
	}
	
	/**
	 * @return array
	 * method return top nav for the blog
	 */
	private function getNavigation(): array
	{
		return [
			["state" => "PUBLISHED",],
			["state" => "DRAFT",],
			["state" => "ARCHIVED",],
		];
	}
}