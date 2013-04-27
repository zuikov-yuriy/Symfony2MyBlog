<?php

namespace Vizitka\ShopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;


class ProductImageForm extends AbstractType {

    private $doctrine;

    public function __construct(RegistryInterface $doctrine) {
        $this->doctrine = $doctrine;
     
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
 
        
        $builder->add('filename', 'file', array('label' => 'Изображение',
                                                'attr' => array("class" => "image_form_productimage"),
                                                'label_attr' => array('class' => 'image_label_productimage')));  
        
        
 
    }


    public function getName() {
        return 'image_form';
    }


}