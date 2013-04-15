<?php

namespace Vizitka\MainBundle\Extension;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Vizitka\MainBundle\Helper\Menu;

class MyTwigExtension extends \Twig_Extension {

    protected $doctrine;
    protected $request;

    public function __construct(RegistryInterface $doctrine, Request $request) {
        $this->doctrine = $doctrine;
        $this->request = $request;
    }

    public function getFilters() {
        return array(
            'menu' => new \Twig_Filter_Method($this, 'menu'),
            'strtr' => new \Twig_Filter_Method($this, 'strtr'),
        );
    }

    public function menu($var, $position) {
        $menu = new Menu($var, $position, $this->request);
        return $menu->menu($this->doctrine);
    }

        public function strtr($readmore, $r) {
        return strtr($r, array($readmore => ""));
    }


              
    
    
    
    public function getName() {
        return 'my_twig_extension';
    }

}