<?php

namespace Vizitka\MainBundle\Helper;

class Menu {

    public function __construct($var, $position, $request) {
        $this->var = $var;
        $this->position = $position;
        $this->request = $request;
    }

    public function menu($doctrina) {

        $path = $this->request->getPathInfo();

        $repository = $doctrina->getRepository('VizitkaMainBundle:Pages');
        $pages = $repository->findAll();
        foreach ($pages as $page) {
            if ('/' . $page->getUrl() == $path) {
                $id = "id=>'activ'";
            } else {
                $id = "id=>'noactiv'";
            }
            $menu[] = array("class" => "class",
                "id" => $page->getId(),
                "position" => $page->getPosition(),
                "name" => $page->getName(),
                "url" => $page->getUrl(),
                "style" => array(
                    "id" => $id,
                    "class" => "class"
                )
            );
        }


        return $menu;
    }

//    function m() {
//        $repository = $this->getDoctrine()->getRepository('VizitkaMainBundle:Pages'); 
//        $menu['top'] = $repository->findByPosition('top');
//        $menu['left'] = $repository->findByPosition('left');
////or
////        $menu['top'] = $repository->findBy(
////                array('position' => 'top')
////        );
//
////and
////        $repository = $this->getDoctrine()
////                ->getRepository('VizitkaMainBundle:Pages');
////
////        $query = $repository->createQueryBuilder('p')
////                ->select('p')
////                ->where('p.position LIKE :position')
////                ->setParameter('position', 'top')
////                ->getQuery();
////        $menu['top'] = $query->getResult();
////
////        $q = $repository->createQueryBuilder('p')
////                ->select('p')
////                ->where('p.position LIKE :position')
////                ->setParameter('position', 'left')
////                ->getQuery();
////        $menu['left'] = $q->getResult();
//        
//
//        return $menu;
//    }
//            $repository = $doctrina->getRepository('VizitkaMainBundle:Pages');
//        $pages = $repository->findAll();
//              
//        foreach ($pages as $page){
//            
//              if ($page->getPosition() == $this->position) {    
//                  $menu[] = array("id"=>$page->getId(), "name"=>$page->getName(), "url"=>$page->getUrl());
//                 } 
//
//        }
//
//     
//        return $menu;
}