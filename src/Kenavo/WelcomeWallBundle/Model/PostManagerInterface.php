<?php

namespace Kenavo\WelcomeWallBundle\Model;

use Kenavo\WelcomeWallBundle\Entity\Tweet;

/**
* PostManagerInterface.
*
* @author Baptiste DUPUCH <baptiste.dupuch@gmail.com>
*/
interface PostManagerInterface
{
   /**
* Finds the posts to display.
*
* @return Collection The posts.
*/
    function findCurrentPosts();
    
    /**
* Finds posts ready to be removed.
*
* @return Collection The old posts.
*/
    function findOldPosts();
    
    /**
* Removes old posts.
*
* @return Collection The old posts.
*/
    function removeOldPosts();
    
    /**
* Updates a post.
*
* @param Post $post The post.
* @param boolean $andFlush True if the EntityManager should be flushed.
*/
    function updateTweet(Tweet $tweet, $andFlush = true);
}