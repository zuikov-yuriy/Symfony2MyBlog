<?php

namespace Vizitka\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;



class ProductImageForm extends AbstractType {



    public function buildForm(FormBuilderInterface $builder, array $options) {
 
        
        $builder->add('filename', 'file', array('label' => 'Изображение',
                                                'attr' => array("class" => "image_form_productimage"),
                                                'label_attr' => array('class' => 'image_label_productimage')));  
        
        
 
    }

 public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Vizitka\ShopBundle\Entity\ImagesShop',
        );
    }
    
    public function getName() {
        return 'image_form';
    }


}