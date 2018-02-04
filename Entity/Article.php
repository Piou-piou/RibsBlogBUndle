<?php

namespace PiouPiou\RibsBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RibsmoduleBlogArticle
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
     * @var \RibsmoduleBlogState
     *
     * @ORM\ManyToOne(targetEntity="RibsmoduleBlogState")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ribsmodule_blog_state_id", referencedColumnName="id")
     * })
     */
    private $ribsmoduleBlogState;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="RibsmoduleBlogCategory", mappedBy="ribsmoduleBlogArticle")
     */
    private $ribsmoduleBlogCategory;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ribsmoduleBlogCategory = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
