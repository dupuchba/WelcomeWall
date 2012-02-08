<?php

namespace Kenavo\WelcomeWallBundle\Entity;

use Kenavo\WelcomeWallBundle\Entity\PostManagerInterface;
use Kenavo\WelcomeWallBundle\Entity\Tweet;
use Doctrine\ORM\EntityManager;

/**
* PostManager.
*
* @author Baptiste DUPUCH <baptiste.dupuch@gmail.com>
*/
class PostManager implements PostManagerInterface
{
    /**
* @var EntityManager $em
*/
    protected $em;
    
    /**
* @var integer $keepAliveDays
*/
    protected $keepAliveDays;
    
    /**
* Constructs a new instance of PostManager.
*
* @param EntityManager $em The entity manager.
* @param integer $keepAliveDays The number of days to keep tweets alive.
*/
    public function __construct(EntityManager $em, $keepAliveDays)
    {
        $this->em = $em;
        $this->keepAliveDays = $keepAliveDays;
    }
    
    /**
* {@inheritDoc}
*/
    public function findCurrentPosts()
    {
        $qb = $this->em->createQueryBuilder()
                ->select('p')
                ->from('KenavoWelcomeWallBundle:Post', 'p')
                ->orderBy('p.createdAt', 'DESC');
        
        return $qb->getQuery()->getResult();
    }
    
    /**
* {@inheritDoc}
*/
    public function findOldPosts()
    {
        $qb = $this->em->createQueryBuilder()
                ->select('p')
                ->from('KenavoWelcomeWallBundle:Post', 'p')
                ->where('p.createdAt < :date');
        
        $date = new \DateTime(sprintf('-%s days', $this->keepAliveDays));
        
        $qb->setParameter('date', $date);
        
        return $qb->getQuery()->getResult();
    }
    
    /**
* {@inheritDoc}
*/
    public function removeOldPosts()
    {
        $counter = 0;
        $batchSize = 50;
        
        $posts = $this->findOldPosts();
        foreach ($posts as $post) {
            $this->em->remove($post);
            
            if ($counter > 0 && $counter % $batchSize == 0) {
                $this->em->flush();
                $this->em->clear();
            }
            
            $counter++;
        }
        
        $this->em->flush();
    }
    
    /**
* {@inheritDoc}
*/
    public function updatePost(Post $post, $andFlush = true)
    {
        $this->em->persist($post);
        if ($andFlush) {
            $this->em->flush();
        }
    }
}