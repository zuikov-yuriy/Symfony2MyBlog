<?php

namespace Vizitka\MainBundle\Helper;

use Symfony\Component\Templating\Helper\Helper;

class Tracker extends Helper
{
    protected $profileId;

    public function __construct($profileId)
    {
        $this->profileId = $profileId;
    }
    
    
    

    public function getName()
    {
        return  $this->profileId;
    }
}