<?php

namespace Vizitka\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;


class CategoryForm extends AbstractType {

    private $doctrine;

    public function __construct(RegistryInterface $doctrine, $check) {
        $this->doctrine = $doctrine;
        $this->check= $check;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('id', 'hidden');
        
        $builder->add('parent_id', 'choice',array('label' => 'Категория',
                                            'choices' => $this->select(),
                                            'attr' => array("class" => "url_form_category"),
                                            'label_attr' => array('class' => 'url_label_category'))); 

        
        $builder->add('name', 'text', array('label' => 'Название',
                                            'attr' => array("class" => "url_form_category"),
                                            'label_attr' => array('class' => 'url_label_category')));  
        
        $builder->add('meta_title', 'text', array('label' => 'Заголовок',
                                                'attr' => array("class" => "title_form_category"),
                                                'label_attr' => array('class' => 'title_label_category')));     
        
        $builder->add('meta_keywords', 'text', array('label' => 'Ключевые слова',
                                                'attr' => array("class" => "keywords_form_category"),
                                                'label_attr' => array('class' => 'keywords_label_category')));  
        
        $builder->add('meta_description', 'text', array('label' => 'Описание',
                                                'attr' => array("class" => "description_form_category"),
                                                'label_attr' => array('class' => 'description_label_category')));  
        
        $builder->add('description', 'text', array('label' => 'Описанте',
                                            'attr' => array("class" => "url_form_category"),
                                            'label_attr' => array('class' => 'url_label_category'))); 
        
        $builder->add('url', 'text', array('label' => 'Адрес',
                                            'attr' => array("class" => "url_form_category"),
                                            'label_attr' => array('class' => 'url_label_category')));    
        
        
        $builder->add('visible', 'checkbox', array('label' => 'Активно',
                                                   'required'  => false, 
                                                   'attr'      => $this->check == 'add' ? array('checked'   => 'checked'):array(),
                                                   ));
 
    }

       public function select() {
        $pages = $this->doctrine
                ->getRepository('VizitkaShopBundle:CategoriesShop')
                ->findBy(
                        array('parent_id' => 0)
                        );

        $this->PageSelect[0] = 'Родительская категория';
        foreach ($pages as $p) {
            $this->PageSelect[$p->getId()] = $p->getName();
        }
        
        return $this->PageSelect;
    }

    public function getName() {
        return 'category_form';
    }

}