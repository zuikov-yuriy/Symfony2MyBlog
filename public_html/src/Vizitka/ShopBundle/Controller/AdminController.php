<?php

namespace Vizitka\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Response,
    Symfony\Component\HttpFoundation\Request,
    Vizitka\ShopBundle\Entity\ProductsShop,
    Vizitka\ShopBundle\Entity\ImagesShop,
    Vizitka\ShopBundle\Entity\CategoriesShop,
    Vizitka\ShopBundle\Entity\BrandsShop;
use Vizitka\ShopBundle\Form\Type\CategoryForm,
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
//        $csrf = $this->get('form.csrf_provider'); 
//        $token = $csrf->generateCsrfToken(session_id()); 
//        if ($csrf->isCsrfTokenValid(session_id(),$token)) {}
        if ($request->getMethod() == 'POST') {
            $request = Request::createFromGlobals();
            $product_form = $request->request->get('product_form');
            $file = $request->files->get('filename');
            if (!empty($file)) {
                $file_origin_name = $file->getClientOriginalName();
                $file->move($_SERVER['DOCUMENT_ROOT'] . 'images/shop/product/', $file_origin_name);
            }
            $em = $this->getDoctrine()->getEntityManager();

            $image = new ImagesShop();
            if (empty($file_origin_name)) {
                $image->setFilename('no_image.png');
                $image->setName('no_image.png');
            } else {
                $image->setFilename($file_origin_name);
                $image->setName($file_origin_name);
            }

            $product = new ProductsShop();
            $image->setProduct($product);
            // $product->updateFromArray($product_form);
            $product->setUrl($product_form['url']);
            $product->setBrandId($product_form['brand_id']);
            $product->setCategoryId($product_form['category_id']);
            $product->setName($product_form['name']);
            $product->setPrice($product_form['price']);
            $product->setSku($product_form['sku']);
            $product->setAnnotation($product_form['annotation']);
            $product->setBody($product_form['body']);
            if (empty($product_form['visible'])) {
                $product->setVisible(false);
            }
            $product->setMetaTitle($product_form['meta_title']);
            $product->setMetaKeywords($product_form['meta_keywords']);
            $product->setMetaDescription($product_form['meta_description']);
            $product->setBrandId($product_form['brand_id']);
            $product->setCreated(new \DateTime("now"));
            $product->setFeatured('0');

            $validator = $this->get('validator');
            $errors = $validator->validate($product);
            if (count($errors) > 0) {
                foreach ($errors as $e) {
                    $error[$e->getPropertyPath()] = $e->getMessage();
                }
                return $this->render('VizitkaShopBundle:Admin:product/product.html.twig', array(
                            'error' => $error,
                            'product' => $product_form,
                            'path' => 'shop_add_product'
                        ));
            } else {
                return $this->redirect('/shop/admin/products/');
                $em->persist($product);
                $em->persist($image);
                $em->flush();
            }
        }

        $product['visible']= 1;
        return $this->render('VizitkaShopBundle:Admin:product/product.html.twig', array(
                    'product' =>  $product,
                    'path' => 'shop_add_product'
                ));
    }

    public function edit_productAction($id) {

        $p = $this->getDoctrine()->getRepository('VizitkaShopBundle:ProductsShop')->find($id);
        $product['id'] = $p->getId();
        $product['url'] = $p->getUrl();
        $product['brand_id'] = $p->getBrandId();
        $product['category_id'] = $p->getCategoryId();
        $product['name'] = $p->getName();
        $product['price'] = $p->getPrice();
        $product['sku'] = $p->getSku();
        $product['annotation'] = $p->getAnnotation();
        $product['body'] = $p->getBody();
        $product['visible'] = $p->getVisible();
        $product['meta_title'] = $p->getMetaTitle();
        $product['meta_keywords'] = $p->getMetaKeywords();
        $product['meta_description'] = $p->getMetaDescription();
        $product['created'] = $p->getCreated()->format('Y-m-d H:i:s');
        $product['featured'] = $p->getFeatured();

        foreach ($p->getImages() as $img) {
            $product['filename'] = $img->getFilename();
        }

        return $this->render('VizitkaShopBundle:Admin:product/product.html.twig', array(
                    'product' => $product,
                    'path' => 'shop_product_update'
                ));
    }

    public function update_productAction() {
        $request = Request::createFromGlobals();
        $product_form = $request->request->get('product_form');
        $em = $this->getDoctrine()->getEntityManager();
        $id = $product_form['id'];
        $product_edit = $em->getRepository('VizitkaShopBundle:ProductsShop')->find($id);
        $product_edit->updateFromArray($product_form);
        if (empty($product_form['visible'])) {
            $product_edit->setVisible(false);
        }

        $file = $request->files->get('filename');
        foreach ($product_edit->getImages() as $image) {
            $filename = $image->getFilename();
            if (!empty($file)) {
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . 'images/shop/product/' . $filename)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . 'images/shop/product/' . $filename);
                }
                $file_origin_name = $file->getClientOriginalName();
                $image->setFilename($file_origin_name);
                $image->setName($file_origin_name);
                $file->move($_SERVER['DOCUMENT_ROOT'] . 'images/shop/product/', $file_origin_name);
            }
        }

        $validator = $this->get('validator');
        $errors = $validator->validate($product_edit);
        if (count($errors) > 0) {
            foreach ($errors as $e) {
                $error[$e->getPropertyPath()] = $e->getMessage();
            }
            return $this->render('VizitkaShopBundle:Admin:product/product.html.twig', array(
                        'error' => $error,
                        'product' => $product_form,
                        'path' => 'shop_product_update'
                    ));
        } else {
            $em->flush();
            return $this->redirect('/shop/admin/products/');
        }
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
            
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function categoriesAction() {
        $repository = $this->getDoctrine()->getRepository('VizitkaShopBundle:CategoriesShop');
        $categories = $repository->findAll();
        return $this->render('VizitkaShopBundle:Admin:category/categories.html.twig', array(
                    'categories' => $categories,
                ));
    }

    

    
    public function add_categoryAction(Request $request) {

        if ($request->getMethod() == 'POST') {

            $em = $this->getDoctrine()->getEntityManager();
            $category = new CategoriesShop();
            $request = Request::createFromGlobals();
            $category_form = $request->request->get('category_form');

            $file = $request->files->get('file');
            if (!empty($file)) {
                $file_origin_name = $file->getClientOriginalName();
                $file->move($_SERVER['DOCUMENT_ROOT'] . 'images/shop/category/', $file_origin_name);
                $category->setImage($file_origin_name);
            } else {
                $category->setImage('no_image_category.png');
            }

            $category->setParentId($category_form['parent_id']);
            $category->setName($category_form['name']);
            $category->setMetaTitle($category_form['meta_title']);
            $category->setMetaKeywords($category_form['meta_keywords']);
            $category->setMetaDescription($category_form['meta_description']);
            $category->setDescription($category_form['description']);
            $category->setUrl($category_form['url']);
            $category->setVisible($category_form['visible']);
            $em->persist($category);
            $em->flush();
            return $this->redirect('/shop/admin/categories/');
        }


        return $this->render('VizitkaShopBundle:Admin:category/category.html.twig', array(
                             'path' => 'shop_add_category'
                ));
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function edit_categoryAction($id) {
        $c = $this->getDoctrine()->getRepository('VizitkaShopBundle:CategoriesShop')->find($id);
        $category['id'] = $c->getId();
        $category['name'] = $c->getName();
        $category['parent_id'] = $c->getParentId();
        $category['meta_title'] = $c->getMetaTitle();
        $category['meta_keywords'] = $c->getMetaKeywords();
        $category['meta_description'] = $c->getMetaDescription();
        $category['description'] = $c->getDescription();
        $category['url'] = $c->getUrl();
        $category['visible'] = $c->getVisible();

        return $this->render('VizitkaShopBundle:Admin:category/category.html.twig', array(
                    'category' => $category,
                    'path' => 'shop_category_update'
                ));
    }

    
    
    
    
    public function update_categoryAction(Request $request) {
        $request = Request::createFromGlobals();
        $category_form = $request->request->get('category_form');
        $em = $this->getDoctrine()->getEntityManager();
        $id = $category_form['id'];
        $category_edit = $em->getRepository('VizitkaShopBundle:CategoriesShop')->find($id);
        $category_edit->updateFromArray($category_form);
        if (empty($category_form['visible'])) {
            $category_edit->setVisible(false);
        }

        $file = $request->files->get('file');
        $filename = $category_edit->getImage();
            if (!empty($file)) {
                if (file_exists($_SERVER['DOCUMENT_ROOT'] . 'images/shop/category/' . $filename)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . 'images/shop/category/' . $filename);
                }
                $file_origin_name = $file->getClientOriginalName();
                $category_edit->setImage($file_origin_name);
                $category_edit->setImage($file_origin_name);
                $file->move($_SERVER['DOCUMENT_ROOT'] . 'images/shop/category/', $file_origin_name);
            }
        

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
        if (empty($form['visible'])) {
            $brand_edit->setVisible(false);
        }
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
