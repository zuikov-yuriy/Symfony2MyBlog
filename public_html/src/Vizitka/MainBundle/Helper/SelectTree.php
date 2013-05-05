<?php

namespace Vizitka\MainBundle\Helper;


class SelectTree {

   public function __construct($select, $name)
    {
        $this->html = '';
        $this->list = array();
        $this->select = $select;
        $this->name =$name;
    }
    
    

       
        function listtree($items)
      {
           foreach($items as $i){
              if (!isset($this->list[$i->getParentId()])) $this->list[$i->getParentId()] = array();
              $this->list[$i->getParentId()][] = $i;
           }
           
          $this->tree($this->list, 0);
          return '<select required="required" name="'.$this->name.'"><option value="0">Корневая категория</option>'.$this->html.'</select>';
      }
        

          
      function tree($list, $id, $level = 0){
           $space = '';
           $x = 0;
           if(isset($list[$id])) {
                        foreach($list[$id] as $value){                    
                          while ($x++<$level)  $space .= '&nbsp;&nbsp;&nbsp;';
                          if($this->select == $value->getId()) {$selected = 'selected';} else {$selected = '';} 
                          $this->html .=  '<option '.$selected.' value="'.$value->getId().'">'.$space.$value->getName().'</option>'; 
                          $this->tree($this->list, $value->getId(), $level + 1 ); 
                        }
          }   
       } 
       
       
  
}