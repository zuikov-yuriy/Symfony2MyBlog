<?php

namespace Vizitka\ShopBundle\Helper;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\View\TwitterBootstrapView;

class Pagin {

  public function pagination($page, $results, $routeName ){
        
            $adapter = new ArrayAdapter($results);
            $pagerfanta = new Pagerfanta($adapter);
            $pagerfanta->setMaxPerPage(10);

            if (!$page) {
                $page = 1;
            }
            try {
                $pagerfanta->setCurrentPage($page);
            } catch (NotValidCurrentPageException $e) {
                throw new NotFoundHttpException();
            }
            $entities = $pagerfanta->getCurrentPageResults();
            $routeGenerator = function($page) use ($routeName) {
                        return 'http://freelance.net/' . $routeName . '/' . $page . '/';
                    };
                    
//            $me = $this;
//            $routeGenerator = function($page) use ($me) {
//                        $request = $me->container->get('request');
//                        $routeName = $request->get('page_name');
//                        return 'http://freelance.net/' . $routeName . '/' . $page . '/';
//                    };

            $view = new TwitterBootstrapView();
            $html = $view->render($pagerfanta, $routeGenerator, array('proximity' => 1,));
        
            return array('entities' => $entities, 'html' => $html);
    }
    
}