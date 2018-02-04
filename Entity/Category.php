<?php

namespace PiouPiou\RibsBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RibsmoduleBlogCategory
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
     * @ORM\ManyToMany(targetEntity="RibsmoduleBlogArticle", inversedBy="ribsmoduleBlogCategory")
     * @ORM\JoinTable(name="ribsmodule_blog_category_has_ribsmodule_blog_article",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ribsmodule_blog_category_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ribsmodule_blog_article_id", referencedColumnName="id")
     *   }
     * )
     */
    private $ribsmoduleBlogArticle;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ribsmoduleBlogArticle = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
