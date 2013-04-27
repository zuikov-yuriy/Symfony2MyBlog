<?php

namespace Vizitka\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;


class ProductForm extends AbstractType {

    private $doctrine;

    public function __construct(RegistryInterface $doctrine,  $check) {
        $this->doctrine = $doctrine;
        $this->check= $check;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('id', 'hidden');
        
        $builder->add('url', 'text', array('label' => 'Адрес',
                                            'attr' => array("class" => "url_form_product"),
                                            'label_attr' => array('class' => 'url_label_product'))); 
        
        $builder->add('brand_id', 'choice',  array('label' => 'Брэнд',
                                            'attr' => array("class" => "brand_form_product"),
                                            'label_attr' => array('class' => 'brand_label_product'),
                                            'choices' => $this->select('VizitkaShopBundle:BrandsShop')));
        

        $builder->add('name', 'text', array('label' => 'Название',
                                            'attr' => array("class" => "name_form_product"),
                                            'label_attr' => array('class' => 'name_label_product'))); 
        
        $builder->add('category_id', 'choice',  array('label' => 'Категория',
                                             'attr' => array("class" => "category_form_product"),
                                             'label_attr' => array('class' => 'category_label_product'),
                                            'choices' => $this->select('VizitkaShopBundle:CategoriesShop')));
         
        $builder->add('price', 'text', array('label' => 'Цена',
                                            'attr' => array("class" => "price_form_product"),
                                            'label_attr' => array('class' => 'price_label_product'))); 
         
        $builder->add('sku', 'text', array('label' => 'Артикул',
                                            'attr' => array("class" => "sku_form_product"),
                                            'label_attr' => array('class' => 'sku_label_product'))); 
                
        $builder->add('annotation', 'textarea', array('label' => 'Краткое описание',
                                                      'required'  => false,
                                                      'attr' => array("class" => "annotation_form_product"),
                                                      'label_attr' => array('class' => 'annotation_label_product'))); 
        
        $builder->add('body', 'textarea', array('label' => 'Полное описание',
                                                'required'  => false,
                                                'attr' => array("class" => "body_form_product"),
                                                'label_attr' => array('class' => 'body_label_product')));  
        
        
        $builder->add('visible', 'checkbox', array('label' => 'Активно',
                                                   'required'  => false, 
                                                   'attr'      => $this->check == 'add' ? array('checked'   => 'checked'):array(),
                                                   ));



        $builder->add('meta_title', 'text', array('label' => 'Заголовок',
                                                'attr' => array("class" => "title_form_product"),
                                                'label_attr' => array('class' => 'title_label_product')));     
        
        $builder->add('meta_keywords', 'text', array('label' => 'Ключевые слова',
                                                'attr' => array("class" => "keywords_form_product"),
                                                'label_attr' => array('class' => 'keywords_label_product')));  
        
        $builder->add('meta_description', 'text', array('label' => 'Описание',
                                                'attr' => array("class" => "description_form_product"),
                                                'label_attr' => array('class' => 'description_label_product')));  
        
        $builder->add('featured', 'text', array('label' => 'Характеристики',
                                                'attr' => array("class" => "featured_form_product"),
                                                'label_attr' => array('class' => 'featured_label_product')));  
        
  
 
    }

     public function select($db) {
        $pages = $this->doctrine
                ->getRepository($db)
                ->findAll();

        foreach ($pages as $p) {
            $PageSelect[$p->getId()] = $p->getName();
        }
        return $PageSelect;
    }

    public function getName() {
        return 'product_form';
    }

}