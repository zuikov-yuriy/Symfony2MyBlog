<?php

namespace Vizitka\MainBundle\Helper;


class Tree {

   public function __construct()
    {
        $this->html = '';
        $this->list = array();
    }
    
    
      function listarray($items)
      {
           foreach($items as $i){
              if (!isset($this->list[$i->getParent()])) $this->list[$i->getParent()] = array();
              $this->list[$i->getParent()][] = $i;
           }
           
          $this->parent($this->list, 0);
          return '<div class="tree">'.$this->html.'</div>';
      }
        

          
      function parent($list, $id){
           if(isset($list[$id])) {
              $this->html .=  '<ul>';
                        foreach($list[$id] as $value){
                            
                          $this->html .= '<li>'.$value->getName(); 

                          $this->html .= '</li>';  
                          
                          $this->parent($this->list, $value->getId()); 
                        }
               $this->html .= '</ul>';
          }   
       } 
  
}