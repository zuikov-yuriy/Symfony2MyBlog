<?php

namespace Vizitka\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vizitka\MainBundle\Helper\Help;
use Vizitka\MainBundle\Helper\Tree;


class DefaultController extends Controller {

    public function __construct() {
        
    }

    public function indexAction($page = null) {  
 
        $repository = $this->getDoctrine()->getRepository('VizitkaMainBundle:Pages');
        $items = $repository->findAll();
        
        $tree = new Tree();
        $html = $tree->listarray($items);
      
     
        
        $p = $this->page('');
        return $this->render('VizitkaMainBundle:Default:main.html.twig', array(
                    'name' => $p->getName(),
                    'content' => $this->content($p->getId()),
                    'id' => $page,
                    'tree'=> $html,
                         ));
    }

    function content($page_id) {
        $repository = $this->getDoctrine()->getRepository('VizitkaMainBundle:Articles');
        $content = $repository->findBy(array('page_id' => $page_id));
        return $content;
    }

    function page($page_name) {
        $page = $this->getDoctrine()
                ->getRepository('VizitkaMainBundle:Pages')
                ->findOneByUrl($page_name);
        return $page;
    }

    public function pageAction($page_name, $page = null) {
        $url_patch = $page_name . '/';
        $conn = $this->get('database_connection');
        $pages = $conn->fetchAssoc('SELECT * FROM Pages WHERE url = "' . $url_patch . '"');
        
        if ($pages) {
            $repository = $this->getDoctrine()
                    ->getRepository('VizitkaMainBundle:Articles');
            $query = $repository->createQueryBuilder('a')
                    ->select('a')
                    ->where('a.page_id LIKE :page_id')
                    ->setParameter('page_id', $pages['id'])
                    ->getQuery();
            $results = $query->getResult();

            $help = new Help();
            $routeName = $this->container->get('request')->get('page_name');   
            $pagination = $help->pagination($page, $results, $routeName);
            
            if (count($pagination['entities']) == '0') $pagination['html'] = '';
            
            return $this->render('VizitkaMainBundle:Default:preview.html.twig', array(
                        'name' => $pages["name"],
                        'content' => $pagination['entities'],
                        'id' => $page,
                        'pagerfanta' => $pagination['html'],
                    ));
        } else {

            $repository = $this->getDoctrine()->getRepository('VizitkaMainBundle:Articles');
            $article = $repository->findBy(array('url' => $url_patch));
            foreach ($article as $a) {
                $name = $a->getTitle();
            }
            return $this->render('VizitkaMainBundle:Default:article.html.twig', array(
                        'name' => $name,
                        'content' => $article,
                        'id' => $page,
                    ));
        }
    }

}

