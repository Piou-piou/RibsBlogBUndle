<?php

namespace PiouPiou\RibsBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Article
 *
 * @ORM\Table(name="ribsmodule_blog_article")
 * @ORM\Entity
 */
class Article
{
	const PUBLISHED = 1,
		DRAFT = 2,
		ARCHIVED = 3;
	
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
	 * @ORM\Column(name="title_tag", type="string", length=150, nullable=false)
	 */
	private $titleTag;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="description_tag", type="string", length=150, nullable=false)
	 */
	private $descriptionTag;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="string", length=100, nullable=false)
	 */
	private $title;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="article", type="text", nullable=false)
	 */
	private $article;
	
	/**
	 * @var string|null
	 *
	 * @ORM\Column(name="url", type="string", length=100, nullable=true)
	 */
	private $url;
	
	/**
	 * @var \DateTime|null
	 *
	 * @ORM\Column(name="publication_date", type="datetime", nullable=true)
	 */
	private $publicationDate;
	
	/**
	 * @var int
	 *
	 * @ORM\Column(name="state", type="integer", nullable=false)
	 */
	private $state;
	
	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="Category", mappedBy="blogArticle")
	 */
	private $blogCategory;
	
	/**
	 * @var \DateTime
	 *
	 * @Gedmo\Timestampable(on="create")
	 * @ORM\Column(name="creation_date", type="date", nullable=true)
	 */
	private $creationDate;
	
	/**
	 * @var \DateTime
	 *
	 * @Gedmo\Timestampable(on="update")
	 * @ORM\Column(name="update_date", type="date", nullable=true)
	 */
	private $updateDate;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->blogCategory = new \Doctrine\Common\Collections\ArrayCollection();
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
	public function getTitleTag(): ?string
	{
		return $this->titleTag;
	}
	
	/**
	 * @param string $titleTag
	 */
	public function setTitleTag(string $titleTag)
	{
		$this->titleTag = $titleTag;
	}
	
	/**
	 * @return string
	 */
	public function getDescriptionTag(): ?string
	{
		return $this->descriptionTag;
	}
	
	/**
	 * @param string $descriptionTag
	 */
	public function setDescriptionTag(string $descriptionTag)
	{
		$this->descriptionTag = $descriptionTag;
	}
	
	/**
	 * @return string
	 */
	public function getTitle(): ?string
	{
		return $this->title;
	}
	
	/**
	 * @param string $title
	 */
	public function setTitle(string $title)
	{
		$this->title = $title;
	}
	
	/**
	 * @return string
	 */
	public function getArticle(): ?string
	{
		return $this->article;
	}
	
	/**
	 * @param string $article
	 */
	public function setArticle(string $article)
	{
		$this->article = $article;
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
	 * @return \DateTime|null
	 */
	public function getPublicationDate()
	{
		return $this->publicationDate;
	}
	
	/**
	 * @param \DateTime|null $publicationDate
	 */
	public function setPublicationDate($publicationDate)
	{
		$this->publicationDate = $publicationDate;
	}
	
	/**
	 * @return string
	 */
	public function getState(): string
	{
		if ($this->state === $this::DRAFT) {
			return "DRAFT";
		} else if ($this->state === $this::ARCHIVED) {
			return "ARCHIVED";
		}
		
		return "PUBLISHED";
	}
	
	/**
	 * @param int $state
	 */
	public function setState(int $state)
	{
		$this->state = $state;
	}
	
	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getBlogCategory(): \Doctrine\Common\Collections\Collection
	{
		return $this->blogCategory;
	}
	
	/**
	 * @param \Doctrine\Common\Collections\Collection $blogCategory
	 */
	public function setBlogCategory(\Doctrine\Common\Collections\Collection $blogCategory)
	{
		$this->blogCategory = $blogCategory;
	}
	
	/**
	 * @return \DateTime
	 */
	public function getCreationDate(): \DateTime
	{
		return $this->creationDate;
	}
	
	/**
	 * @param \DateTime $creationDate
	 */
	public function setCreationDate(\DateTime $creationDate)
	{
		$this->creationDate = $creationDate;
	}
	
	/**
	 * @return \DateTime
	 */
	public function getUpdateDate(): \DateTime
	{
		return $this->updateDate;
	}
	
	/**
	 * @param \DateTime $updateDate
	 */
	public function setUpdateDate(\DateTime $updateDate)
	{
		$this->updateDate = $updateDate;
	}
}
