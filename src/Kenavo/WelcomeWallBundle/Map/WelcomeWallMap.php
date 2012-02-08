<?php

namespace Kenavo\WelcomeWallBundle\Map;

use Vich\GeographicalBundle\Map\Map;

/**
* WelcomeWallMap.
*
* @author Baptiste DUPUCH <ddobervich@gmail.com>
*/
class WelcomeWallMap extends Map
{
/**
* Constructs a new instance of WelcomeWallMap
*/
    public function __construct()
    {
        parent::__construct();
        
        $this->setWidth('100%');
        $this->setHeight('100%');
        $this->setShowZoomControl(true);
        $this->setShowInfoWindowsForMarkers(true);
        $this->setVarName('WelcomeWallMap');
    }
}