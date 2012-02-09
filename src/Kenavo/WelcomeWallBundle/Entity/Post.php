<?php

namespace Kenavo\WelcomeWallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\GeographicalBundle\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
* .
*
* @author Baptiste DUPUCH <baptiste.dupuch@gmail.com>
*
* @ORM\Entity
* @ORM\Table(name="post")
* @Vich\Geographical
*/
class Post
{
    /**
* @ORM\Id
* @ORM\Column(type="integer")
* @ORM\GeneratedValue(strategy="AUTO")
*
* @var integer $id
*/
    protected $id;

    
    /**
* @ORM\Column(type="text")
*
* @Assert\NotBlank(message="The message is required.", groups={"CreatePost"})
*
* @var string $message
*/
    protected $message;
    
      
    /**
* @ORM\Column(type="decimal", scale="7")
*
* @var double $latitude
*/
    protected $latitude;
    
    /**
* @ORM\Column(type="decimal", scale="7")
*
* @var double $longitude
*/
    protected $longitude;
    
    /**
* @ORM\Column(type="datetime", name="created_at")
*
* @var \DateTime $createdAt
*/
    protected $createdAt;
    
 
    
    /**
* Constructs a new instance of Tweet.
*/
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }
    
    /**
* Returns a string representation of the object.
*
* @return string The string representation.
*/
    public function __toString()
    {
        return $this->getMessage();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set message
     *
     * @param text $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     *
     * @return text 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set latitude
     *
     * @param decimal $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get latitude
     *
     * @return decimal 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param decimal $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get longitude
     *
     * @return decimal 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @Vich\GeographicalQuery
     *
     * This method builds the full address to query for coordinates.
     */
    public function getAddress()
    {
        return sprintf(
            '%s, %s',
            $this->latitude,
            $this->longitude
        );
    }
}