<?php

namespace Vizitka\MainBundle\Extension;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Vizitka\MainBundle\Helper\Menu;
use Vizitka\MainBundle\Helper\SelectTree;


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
            'select' => new \Twig_Filter_Method($this, 'select'),
            'checkbox' => new \Twig_Filter_Method($this, 'checkbox'),
            'tree' => new \Twig_Filter_Method($this, 'tree'),
        );
    }

    public function menu($var, $position) {
        $menu = new Menu($var, $position, $this->request);
        return $menu->menu($this->doctrine);
    }

    public function strtr($readmore, $r) {
        return strtr($r, array($readmore => ""));
    }

    public function select($select, $name, $entity) {
        $repository = $this->doctrine->getRepository($entity);
        $brands = $repository->findAll();
         $html = '<select required="required" name="'.$name.'">';
         $html .= '<option value=""></option>';
        foreach ($brands as $brand) {
          if($select == $brand->getId()) {$selected = 'selected';} else {$selected = '';} 
             $html .='<option '.$selected.' value="'.$brand->getId().'">'.$brand->getName().'</option>';
        }
         $html .= '</select>';
        return $html;
    }
    
    public function tree($select, $name, $entity) {
       $repository = $this->doctrine->getRepository($entity);
       $categories = $repository->findAll();
       $tree = new SelectTree($select, $name);
       $html = $tree->listtree($categories);

        return $html;
    }
    
    
    public function checkbox($check, $name){
        
        if($check == 1 ) {$checked = 'checked';} else {$checked = '';}
        $html = '<input '.$checked.' type="checkbox" name="'.$name.'" value="1">';
        return $html;
    }
    
    
    
    public function getName() {
        return 'my_twig_extension';
    }

}