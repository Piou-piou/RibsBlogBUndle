<?php

namespace PiouPiou\RibsBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Article
 *
 * @ORM\Table(name="ribsmodule_blog_article", indexes={@ORM\Index(name="fk_ribsmodule_blog_article_ribsmodule_blog_state1_idx", columns={"ribsmodule_blog_state_id"})})
 * @ORM\Entity
 */
class Article
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
     * @var \state
     *
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ribsmodule_blog_state_id", referencedColumnName="id")
     * })
     */
    private $state;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Category", mappedBy="ribsmoduleBlogArticle")
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
	public function getTitle(): string
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
	public function getArticle(): string
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
	 * @return \state
	 */
	public function getState(): \state
	{
		return $this->state;
	}
	
	/**
	 * @param \state $state
	 */
	public function setState(\state $state)
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