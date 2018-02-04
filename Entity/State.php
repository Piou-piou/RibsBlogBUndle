<?php

namespace PiouPiou\RibsBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * State
 *
 * @ORM\Table(name="ribsmodule_blog_state")
 * @ORM\Entity
 */
class State
{
	const   PUBLISHED = 1,
			DRAFT = 2,
			ARCHIVED  = 3;
	
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
     * @ORM\Column(name="state", type="string", length=255, nullable=false)
     */
    private $state;
	
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
	public function getState(): string
	{
		return $this->state;
	}
	
	/**
	 * @param string $state
	 */
	public function setState(string $state)
	{
		$this->state = $state;
	}
}
