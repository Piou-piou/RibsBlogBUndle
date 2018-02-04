<?php

namespace PiouPiou\RibsBlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RibsmoduleBlogConfiguration
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


}
