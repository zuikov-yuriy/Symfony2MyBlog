<?php

namespace Vizitka\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ModuleForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text', array('label' => 'Имя модуля'))
                ->add('options', 'choice', array(
                    'label' => 'Выбор модуля',
                    'choices' => array('blog' => 'Блог', 'article' => 'Статья', 'shop' => 'Магазин')
                ));
    }

    public function getName() {
        return 'module_form';
    }

}