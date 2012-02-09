<?php

namespace Kenavo\WelcomeWallBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Kenavo\WelcomeWallBundle\Entity\Post;;

/**
* PostController.
*
* @Route("/")
*/
class PostsController extends Controller
{
    /**
     * Lists all Post entities.
     *
     * @Route("/")
     * @Template()
     */
    public function getPostsAction()
    {
        $manager = $this->get('kenavo_welcomewall.post_manager');
        $posts = $manager->findCurrentPosts();
        return array('posts' => $posts);
    }
}