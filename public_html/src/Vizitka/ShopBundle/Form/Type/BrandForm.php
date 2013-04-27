<?php

namespace Vizitka\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;


class BrandForm extends AbstractType {

    private $doctrine;

    public function __construct(RegistryInterface $doctrine, $check) {
        $this->doctrine = $doctrine;
        $this->check= $check;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('id', 'hidden');
      
        
        $builder->add('name', 'text', array('label' => 'Название',
                                            'attr' => array("class" => "url_form_brand"),
                                            'label_attr' => array('class' => 'url_label_brand')));  
        
        $builder->add('url', 'text', array('label' => 'Адрес',
                                            'attr' => array("class" => "url_form_brand"),
                                            'label_attr' => array('class' => 'url_label_brand')));    
        
         $builder->add('meta_title', 'text', array('label' => 'Заголовок',
                                                'attr' => array("class" => "title_form_brand"),
                                                'label_attr' => array('class' => 'title_label_brand')));     
        
        $builder->add('meta_keywords', 'text', array('label' => 'Ключевые слова',
                                                'attr' => array("class" => "keywords_form_brand"),
                                                'label_attr' => array('class' => 'keywords_label_brand')));  
        
        $builder->add('meta_description', 'text', array('label' => 'Описание',
                                                'attr' => array("class" => "description_form_brand"),
                                                'label_attr' => array('class' => 'description_label_brand')));  
        
        $builder->add('description', 'text', array('label' => 'Текст',
                                            'attr' => array("class" => "url_form_brand"),
                                            'label_attr' => array('class' => 'url_label_brand'))); 
        
        $builder->add('image', 'text', array('label' => 'Изображение',
                                            'attr' => array("class" => "url_form_brand"),
                                            'label_attr' => array('class' => 'url_label_brand'))); 
        
        $builder->add('visible', 'checkbox', array('label' => 'Активно',
                                                   'required'  => false, 
                                                   'attr'      => $this->check == 'add' ? array('checked'   => 'checked'):array(),
                                                   ));
 
    }


    public function getName() {
        return 'brand_form';
    }

}