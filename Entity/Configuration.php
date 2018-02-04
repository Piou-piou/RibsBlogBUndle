<?php

namespace PiouPiou\RibsBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration
 *
 * @ORM\Table(name="ribsmodule_blog_configuration")
 * @ORM\Entity
 */
class Configuration
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="article_index", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $articleIndex;
	
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
	 * @return int
	 */
	public function getArticleIndex(): int
	{
		return $this->articleIndex;
	}
	
	/**
	 * @param int $articleIndex
	 */
	public function setArticleIndex(int $articleIndex)
	{
		$this->articleIndex = $articleIndex;
	}
}
