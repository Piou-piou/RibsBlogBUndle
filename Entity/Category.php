<?php

namespace PiouPiou\RibsBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="ribsmodule_blog_category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=100, nullable=false)
     */
    private $category;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=150, nullable=true)
     */
    private $url;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Article", inversedBy="blogCategory")
     * @ORM\JoinTable(name="ribsmodule_blog_category_has_ribsmodule_blog_article",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ribsmodule_blog_category_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ribsmodule_blog_article_id", referencedColumnName="id")
     *   }
     * )
     */
    private $blogArticle;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blogArticle = new \Doctrine\Common\Collections\ArrayCollection();
    }
	
	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}
	
	/**
	 * @param int $id
	 */
	public function setId(int $id)
	{
		$this->id = $id;
	}
	
	/**
	 * @return string
	 */
	public function getCategory(): string
	{
		return $this->category;
	}
	
	/**
	 * @param string $category
	 */
	public function setCategory(string $category)
	{
		$this->category = $category;
	}
	
	/**
	 * @return null|string
	 */
	public function getUrl()
	{
		return $this->url;
	}
	
	/**
	 * @param null|string $url
	 */
	public function setUrl($url)
	{
		$this->url = $url;
	}
	
	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getBlogArticle(): \Doctrine\Common\Collections\Collection
	{
		return $this->blogArticle;
	}
	
	/**
	 * @param \Doctrine\Common\Collections\Collection $blogArticle
	 */
	public function setBlogArticle(\Doctrine\Common\Collections\Collection $blogArticle)
	{
		$this->blogArticle = $blogArticle;
	}
}
