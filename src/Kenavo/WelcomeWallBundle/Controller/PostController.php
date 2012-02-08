<?php

namespace Kenavo\WelcomeWallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kenavo\WelcomeWallBundle\Entity\Post;;

/**
* PostController.
*
* @author Baptiste DUPUCH <baptiste.dupuch@gmail.com>
*/
class PostController extends Controller
{
    /**
* The get posts action.
*
*/
    public function getPostsAction()
    {
        $manager = $this->get('kenavo_welcomewall.post_manager');
        $posts = $manager->findCurrentPosts();
 
        return array('posts' => $posts);
    }
}