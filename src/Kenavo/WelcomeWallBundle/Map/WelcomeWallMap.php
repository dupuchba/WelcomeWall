<?php

namespace Kenavo\WelcomeWallBundle\Map;

use Vich\GeographicalBundle\Map\Map;
use Vich\GeographicalBundle\Map\Marker\MapMarker;
use Kenavo\WelcomeWallBundle\Entity\PostManager;

/**
* WelcomeWallMap.
*
* @author Baptiste DUPUCH <ddobervich@gmail.com>
*/
class WelcomeWallMap extends Map
{

	/**
* @var PostManager $pm
*/
    protected $pm;
/**
* Constructs a new instance of WelcomeWallMap
*/
    public function __construct(PostManager $pm)
    {
        parent::__construct();
		
		$this->pm = $pm;  
        $this->setWidth('100%');
        $this->setHeight('100%');
        $this->setShowZoomControl(true);
        $this->setShowInfoWindowsForMarkers(true);
        $this->setVarName('WelcomeWallMap');

        $posts = $pm->findCurrentPosts();

        foreach ($posts as $post) {
            $this->addMarker(new MapMarker($post->getLatitude(), $post->getLongitude()));
        }
    }
}