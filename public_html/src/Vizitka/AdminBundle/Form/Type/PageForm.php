<?php

namespace Vizitka\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;


class PageForm extends AbstractType {

    private $doctrine;

    public function __construct(RegistryInterface $doctrine) {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text', array('label' => 'Имя пункта меню'))
                ->add('module', 'choice', array('label' => 'Имя модуль', 'choices' => $this->select()))
                ->add('position', 'choice', array(
                    'label' => 'Позиция',
                    'choices' => array('top' => 'Top', 'left' => 'Left')
                ))
                ->getForm();
    }

    public function select() {
        $modules = $this->doctrine
                ->getRepository('VizitkaMainBundle:Modules')
                ->findAll();;

         foreach ($modules as $m) {
            $select[$m->getId()] = $m->getName();
        }
        
        return $select;
    }



    public function getName() {
        return 'page_form';
    }

}