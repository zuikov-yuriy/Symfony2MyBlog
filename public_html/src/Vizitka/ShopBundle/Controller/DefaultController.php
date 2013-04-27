<?php

namespace Vizitka\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

 use Symfony\Component\HttpFoundation\Request,
    Vizitka\ShopBundle\Entity\ProductsShop,
    Vizitka\ShopBundle\Entity\ImagesShop,
    Vizitka\ShopBundle\Entity\CategoriesShop,
    Vizitka\ShopBundle\Entity\BrandsShop;

class DefaultController extends Controller {

    public function indexAction($url_category = 'shop') {
//        $session = $this->getRequest()->getSession();
//        $session->set('foo', 'bar');
//        $foo = $session->get('foo');
//        $request = $this->get('request');
//        $cookies = $request->cookies;      
        if ($url_category == 'shop') {
            $brands = $this->getDoctrine()->getRepository('VizitkaShopBundle:BrandsShop')->findAll();
            $categories = $this->getDoctrine()->getRepository('VizitkaShopBundle:CategoriesShop')->findAll();
            return $this->render('VizitkaShopBundle:Default:index.html.twig', array(
                        'brands' => $brands,
                        'categories' => $categories,
                        'name' => 'Главная'));
        } else {
            return $this->page_category($url_category);
        }
    }

    public function page_category($url_category) {
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQuery("SELECT p FROM VizitkaShopBundle:ProductsShop p WHERE p.id IN (SELECT c.id FROM VizitkaShopBundle:CategoriesShop c WHERE c.url = '$url_category')");
        $products = $query->getResult();
        return $this->render('VizitkaShopBundle:Default:products.html.twig', array(
                    'products' => $products,
                    'url_category'=> $url_category,
                    'name' => 'Продукты'));
    }

    public function page_productAction($url_product) {
//       $em = $this->getDoctrine()->getEntityManager();
//       $query = $em->createQuery("SELECT p FROM VizitkaShopBundle:ProductsShop p WHERE p.url = '$url_product'");
//       $product = $query->getResult();

//        $conn = $this->get('database_connection');
//        $pages = $conn->fetchAssoc('SELECT ProductsShop.*, ImagesShop.filename FROM ProductsShop LEFT JOIN ImagesShop ON ProductsShop.id = ImagesShop.product_id WHERE ProductsShop.url = "'.$url_product.'"');
//        var_dump($pages);

        
        
//
//
//       $em = $this->getDoctrine()->getEntityManager();
//       $qb = $em->createQueryBuilder()
//                            ->select('p, i')
//                            ->from('VizitkaShopBundle:ProductsShop ', 'p')
//                            ->leftJoin('VizitkaShopBundle:ProductsShop', 'i')
//                            ->groupBy('p');
//
//        $product = $qb->getQuery()->getResult();
       
 

    
    
        return $this->render('VizitkaShopBundle:Default:product.html.twig', array(
                    'product' => $product,
                    'name' => 'Продукт'));
    }

}
