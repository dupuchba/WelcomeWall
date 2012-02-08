<?php

namespace Kenavo\WelcomeWallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kenavo\WelcomeWallBundle\Entity\Wall
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Wall
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}