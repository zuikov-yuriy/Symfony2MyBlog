<?php

namespace Vizitka\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        $query = $em->createQuery("SELECT p FROM VizitkaShopBundle:ProductsShop p WHERE p.category_id IN (SELECT c.id FROM VizitkaShopBundle:CategoriesShop c WHERE c.url = '$url_category')");
        $products = $query->getResult();

             foreach ($products as $product){
                 $a['name'] = $product->getName();
                 $a['url'] = $product->getUrl();
                foreach ($product->getImages() as $img){
                   $a['filename'] = $img->getFilename(); 
                }
                if(isset($a)){
                     $array_products[] = $a;          
                  }
               unset($a);  
            }
        
        
        return $this->render('VizitkaShopBundle:Default:products.html.twig', array(
                    'products' => $array_products,
                    'url_category'=> $url_category,
                    'name' => 'Продукты'));
    }

    public function page_productAction($url_product) {
        $products = $this->getDoctrine()->getRepository('VizitkaShopBundle:ProductsShop')->findBy( array('url'=>$url_product));
        foreach ($products as $p){
             $product['name'] = $p->getName();
            foreach ($p->getImages() as $img){
               $product['filename'] = $img->getFilename(); 
            }

        }
        return $this->render('VizitkaShopBundle:Default:product.html.twig', array(
                    'product' => $product,
                    'name' => 'Продукт'));
    }

    
    
    
    
}
