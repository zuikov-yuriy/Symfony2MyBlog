<?php 
    
    
    


//    public function edit_productAction($id) {
//        $product_edit = $this->getDoctrine()->getRepository('VizitkaShopBundle:ProductsShop')->find($id);
//        $image_edit = $this->getDoctrine()->getRepository('VizitkaShopBundle:ImagesShop')->findBy(array ('product_id' => $id));
//    
//        $form_product = $this->createForm(new ProductForm($this->getDoctrine(), 'edit'), $product_edit);
//        $form_image = $this->createForm(new ProductImageForm($this->getDoctrine()), $image_edit);
//        
//        return $this->render('VizitkaShopBundle:Admin:product/edit_product.html.twig', array(
//                    'form_product' => $form_product->createView(),
//                    'form_image' => $form_image->createView(),
//                    'images'=>$image_edit,
//                ));
//    }












//    
//    
//    public function update_productAction(Request $request) {
//        
//
//         if ($this->getRequest()->getMethod() == 'POST') {
//            $form->bindRequest($this->getRequest());
//            if ($form->isValid()) {
//
//            }
//          }
//        
//
//        $em = $this->getDoctrine()->getEntityManager();
//        $product_form = $request->request->get('product_form');
//        $id = $product_form['id'];
//        $product_edit = $em->getRepository('VizitkaShopBundle:ProductsShop')->findOneById($id);
//        $product_edit->updateFromArray($product_form);
//         if (empty($product_form['visible'])){$product_edit->setVisible(false); }
//         
// 
//        $image = new ImagesShop();
//        $form = $this->createForm(new ProductImageForm($this->getDoctrine()),  $image);
//        $form->bindRequest($request);
//        $Data = $form['filename']->getData();
//        $setName = $Data->getClientOriginalName();
//        if ($setName){
//             $query = $em->createQuery("SELECT p FROM VizitkaShopBundle:ImagesShop p WHERE p.product_id = '$id' ");
//             $result = $query->getResult();
//             foreach ($result as $r){
//                 $filename = $r->getFilename();
//                 $i = $r->getId();
//             }
//               //обновляем
//              if (!empty($filename)) {
//                  unlink($_SERVER['DOCUMENT_ROOT'].'images/shop/product/'.$filename);
//                  $img_edit = $em->getRepository('VizitkaShopBundle:ImagesShop')->find($i);
//                  $img_edit->setFilename($setName);
//                  $img_edit->setName($setName);
//                  $img_edit->setProductId($id);
//              }else{
//                //добовляем
//                $image->setFilename($setName);
//                $image->setName($setName);
//                $image->setProductId($id);
//                $em->persist($image);
//              }
//              
//           
//              $Data->move($_SERVER['DOCUMENT_ROOT'].'images/shop/product/', $Data->getClientOriginalName());
//        }
//            
//       
//        $em->flush();
//        return $this->redirect('/shop/admin/products/');
//    }
//


//
//
//
//
//
//
//
// 
//    public function categoriesAction() {
//        $repository = $this->getDoctrine()->getRepository('VizitkaShopBundle:CategoriesShop');
//        $categories = $repository->findAll();
//         return $this->render('VizitkaShopBundle:Admin:category/categories.html.twig', array(
//                    'categories' => $categories,  
//                ));
//    }
//
//
//    public function add_categoryAction(Request $request) {
//        $form = $this->createForm(new CategoryForm($this->getDoctrine(), 'add'), new CategoriesShop());
//        if ($request->getMethod() == 'POST') {
//            $form->bindRequest($request);
//            $em = $this->getDoctrine()->getEntityManager();
//            $em->persist($form->getData());
//            $em->flush();
//            return $this->redirect('/shop/admin/categories/');
//        }
//        return $this->render('VizitkaShopBundle:Admin:category/add_category.html.twig', array(
//            'form' => $form->createView(),
//            ));
//    }
//    
//    
//    
//    public function edit_categoryAction($id) {
//        $category_edit = $this->getDoctrine()->getRepository('VizitkaShopBundle:CategoriesShop')->find($id);
//        $form = $this->createForm(new CategoryForm($this->getDoctrine(), 'edit'), $category_edit);
//         return $this->render('VizitkaShopBundle:Admin:category/edit_category.html.twig', array(
//                   'form' => $form->createView(),
//                ));
//    
//    }
//    
//    
//    
//    
//    public function update_categoryAction(Request $request) {
//        $form = $request->request->get('category_form');
//        $file = $request->files->get('image'); 
//            if (!empty($file)) {
//              $file_origin_name = $file->getClientOriginalName();
//              $file->move($_SERVER['DOCUMENT_ROOT'].'images/shop/category/', $file_origin_name);
//            }
//
//        $em = $this->getDoctrine()->getEntityManager();
//        $category_edit = $em->getRepository('VizitkaShopBundle:CategoriesShop')->find($form['id']);
//        $filename = $category_edit->getImage();
//          if (!empty($filename) && file_exists($_SERVER['DOCUMENT_ROOT'].'images/shop/category/'.$filename)) {
//                  unlink($_SERVER['DOCUMENT_ROOT'].'images/shop/category/'.$filename);
//              }
//          
//        $category_edit->updateFromArray($form);
//        $category_edit->setImage($file_origin_name);
//        if (empty($form['visible'])){$category_edit->setVisible(false); }     
//       
//        $em->flush();
//        return $this->redirect('/shop/admin/categories/');   
//    }
//    
//    
//    
//
//
//
//
//
//
//
//
//
//
//

//    public function categoriesAction() {
//        $repository = $this->getDoctrine()->getRepository('VizitkaShopBundle:CategoriesShop');
//        $categories = $repository->findAll();
//        return $this->render('VizitkaShopBundle:Admin:category/categories.html.twig', array(
//                    'categories' => $categories,
//                ));
//    }
//
//    public function add_categoryAction(Request $request) {
//
//        if ($request->getMethod() == 'POST') {
//
//            $em = $this->getDoctrine()->getEntityManager();
//            $category = new CategoriesShop();
//            $request = Request::createFromGlobals();
//            $category_form = $request->request->get('category_form');
//
//            $file = $request->files->get('file');
//            if (!empty($file)) {
//                $file_origin_name = $file->getClientOriginalName();
//                $file->move($_SERVER['DOCUMENT_ROOT'] . 'images/shop/category/', $file_origin_name);
//                $category->setImage($file_origin_name);
//            } else {
//                $category->setImage('no_image_category.png');
//            }
//
//            $category->setParentId($category_form['parent_id']);
//            $category->setName($category_form['name']);
//            $category->setMetaTitle($category_form['meta_title']);
//            $category->setMetaKeywords($category_form['meta_keywords']);
//            $category->setMetaDescription($category_form['meta_description']);
//            $category->setDescription($category_form['description']);
//            $category->setUrl($category_form['url']);
//            $category->setVisible($category_form['visible']);
//            $em->persist($category);
//            $em->flush();
//            return $this->redirect('/shop/admin/categories/');
//        }
//
//
//        return $this->render('VizitkaShopBundle:Admin:category/category.html.twig', array(
//                ));
//    }
//
//    
//    
//    
//    
//    
//    
//    
//    
//    
//    
//    
//    
//    
//    
//    public function edit_categoryAction($id) {
//
//        return $this->render('VizitkaShopBundle:Admin:category/edit_category.html.twig', array(
//                ));
//    }
//
//    public function update_categoryAction(Request $request) {
//        $form = $request->request->get('category_form');
//        $file = $request->files->get('image');
//        if (!empty($file)) {
//            $file_origin_name = $file->getClientOriginalName();
//            $file->move($_SERVER['DOCUMENT_ROOT'] . 'images/shop/category/', $file_origin_name);
//        }
//
//        $em = $this->getDoctrine()->getEntityManager();
//        $category_edit = $em->getRepository('VizitkaShopBundle:CategoriesShop')->find($form['id']);
//        $filename = $category_edit->getImage();
//        if (!empty($filename) && file_exists($_SERVER['DOCUMENT_ROOT'] . 'images/shop/category/' . $filename)) {
//            unlink($_SERVER['DOCUMENT_ROOT'] . 'images/shop/category/' . $filename);
//        }
//
//        $category_edit->updateFromArray($form);
//        $category_edit->setImage($file_origin_name);
//        if (empty($form['visible'])) {
//            $category_edit->setVisible(false);
//        }
//
//        $em->flush();
//        return $this->redirect('/shop/admin/categories/');
//    }
//
//    
//    
//    
    
    
    
    