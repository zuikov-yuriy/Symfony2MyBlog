<?php

namespace Vizitka\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request,
    Vizitka\ShopBundle\Entity\ProductsShop,
    Vizitka\ShopBundle\Entity\ImagesShop,
    Vizitka\ShopBundle\Entity\CategoriesShop,
    Vizitka\ShopBundle\Entity\BrandsShop;
use Vizitka\ShopBundle\Form\Type\ProductForm, 
    Vizitka\ShopBundle\Form\Type\ProductImageForm,
    Vizitka\ShopBundle\Form\Type\CategoryForm,
    Vizitka\ShopBundle\Form\Type\BrandForm;
use Vizitka\ShopBundle\Helper\Pagin;

class AdminController extends Controller {

    public function indexAction() {
        return $this->render('VizitkaShopBundle:Admin:index.html.twig');
    }

    public function productsAction($page = null) {
        $repository = $this->getDoctrine()->getRepository('VizitkaShopBundle:ProductsShop');
        $products = $repository->findAll();
        $count_product = count($products);
        $p = new Pagin();
        $pagerfanta = $p->pagination($page, $products, 'shop/admin/products');
        return $this->render('VizitkaShopBundle:Admin:product/products.html.twig', array(
                    'count_product' => $count_product,
                    'products' => $pagerfanta['entities'],
                    'pagerfanta' => $pagerfanta['html'],
                ));
    }

    public function add_productAction(Request $request) {
        $form = $this->createForm(new ProductForm($this->getDoctrine(), 'add'), new ProductsShop());
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            $f = $form->getData();
            $f->setCreated(new \DateTime("now"));
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($f);
            $em->flush();
            return $this->redirect('/shop/admin/products/');
        }
        return $this->render('VizitkaShopBundle:Admin:product/add_product.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function edit_productAction($id) {
        $product_edit = $this->getDoctrine()->getRepository('VizitkaShopBundle:ProductsShop')->find($id);
        $image_edit = $this->getDoctrine()->getRepository('VizitkaShopBundle:ImagesShop')->findBy(array ('product_id' => $id));
    
        $form_product = $this->createForm(new ProductForm($this->getDoctrine(), 'edit'), $product_edit);
        $form_image = $this->createForm(new ProductImageForm($this->getDoctrine()), $image_edit);
        
        return $this->render('VizitkaShopBundle:Admin:product/edit_product.html.twig', array(
                    'form_product' => $form_product->createView(),
                    'form_image' => $form_image->createView(),
                    'images'=>$image_edit,
                ));
    }

    
    public function update_productAction(Request $request) {
        $em = $this->getDoctrine()->getEntityManager();
        $product_form = $request->request->get('product_form');
        $id = $product_form['id'];
        $product_edit = $em->getRepository('VizitkaShopBundle:ProductsShop')->findOneById($id);
        $product_edit->updateFromArray($product_form);
         if (empty($product_form['visible'])){$product_edit->setVisible(false); }
         
 
        $image = new ImagesShop();
        $form = $this->createForm(new ProductImageForm($this->getDoctrine()),  $image);
        $form->bindRequest($request);
        $Data = $form['filename']->getData();
        $setName = $Data->getClientOriginalName();
        if ($setName){
             $query = $em->createQuery("SELECT p FROM VizitkaShopBundle:ImagesShop p WHERE p.product_id = '$id' ");
             $result = $query->getResult();
             foreach ($result as $r){
                 $filename = $r->getFilename();
                 $i = $r->getId();
             }
               //обновляем
              if (!empty($filename)) {
                  unlink($_SERVER['DOCUMENT_ROOT'].'images/shop/product/'.$filename);
                  $img_edit = $em->getRepository('VizitkaShopBundle:ImagesShop')->find($i);
                  $img_edit->setFilename($setName);
                  $img_edit->setName($setName);
                  $img_edit->setProductId($id);
              }else{
                //добовляем
                $image->setFilename($setName);
                $image->setName($setName);
                $image->setProductId($id);
                $em->persist($image);
              }
              
           
              $Data->move($_SERVER['DOCUMENT_ROOT'].'images/shop/product/', $Data->getClientOriginalName());
        }
            
       
        $em->flush();
        return $this->redirect('/shop/admin/products/');
    }


       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function categoriesAction() {
        $repository = $this->getDoctrine()->getRepository('VizitkaShopBundle:CategoriesShop');
        $categories = $repository->findAll();
         return $this->render('VizitkaShopBundle:Admin:category/categories.html.twig', array(
                    'categories' => $categories,  
                ));
    }


    public function add_categoryAction(Request $request) {
        $form = $this->createForm(new CategoryForm($this->getDoctrine(), 'add'), new CategoriesShop());
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($form->getData());
            $em->flush();
            return $this->redirect('/shop/admin/categories/');
        }
        return $this->render('VizitkaShopBundle:Admin:category/add_category.html.twig', array(
            'form' => $form->createView(),
            ));
    }
    
    
    
    public function edit_categoryAction($id) {
        $category_edit = $this->getDoctrine()->getRepository('VizitkaShopBundle:CategoriesShop')->find($id);
        $form = $this->createForm(new CategoryForm($this->getDoctrine(), 'edit'), $category_edit);
         return $this->render('VizitkaShopBundle:Admin:category/edit_category.html.twig', array(
                   'form' => $form->createView(),
                ));
    
    }
    
    
    public function update_categoryAction(Request $request) {
        $form = $request->request->get('category_form');
        $em = $this->getDoctrine()->getEntityManager();
        $category_edit = $em->getRepository('VizitkaShopBundle:CategoriesShop')->find($form['id']);
        $category_edit->updateFromArray($form);
        if (empty($form['visible'])){$category_edit->setVisible(false); }
        $em->flush();
        return $this->redirect('/shop/admin/categories/');   
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function brandsAction() {
        $repository = $this->getDoctrine()->getRepository('VizitkaShopBundle:BrandsShop');
        $brands = $repository->findAll();
         return $this->render('VizitkaShopBundle:Admin:brand/brands.html.twig', array(
                    'brands' => $brands,  
                ));
    }


    public function add_brandAction(Request $request) {
        $form = $this->createForm(new BrandForm($this->getDoctrine(), 'add'), new BrandsShop());
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($form->getData());
            $em->flush();
            return $this->redirect('/shop/admin/brands/');
        }
        return $this->render('VizitkaShopBundle:Admin:brand/add_brand.html.twig', array(
            'form' => $form->createView(),
            ));
    }
    
    
    
    public function edit_brandAction($id) {
        $brand_edit = $this->getDoctrine()->getRepository('VizitkaShopBundle:BrandsShop')->find($id);
        $form = $this->createForm(new BrandForm($this->getDoctrine(), 'edit'), $brand_edit);
         return $this->render('VizitkaShopBundle:Admin:brand/edit_brand.html.twig', array(
                   'form' => $form->createView(),
                ));
    
    }
    
    
    public function update_brandAction(Request $request) {
        $form = $request->request->get('brand_form');
        $em = $this->getDoctrine()->getEntityManager();
        $brand_edit = $em->getRepository('VizitkaShopBundle:BrandsShop')->find($form['id']);
        $brand_edit->updateFromArray($form);
        if (empty($form['visible'])){$brand_edit->setVisible(false); }
        $em->flush();
        return $this->redirect('/shop/admin/brands/');   
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  

    public function featuresAction() {
        return $this->render('VizitkaShopBundle:Admin:features.html.twig');
    }

    public function ordersAction() {
        return $this->render('VizitkaShopBundle:Admin:orders.html.twig');
    }

}
