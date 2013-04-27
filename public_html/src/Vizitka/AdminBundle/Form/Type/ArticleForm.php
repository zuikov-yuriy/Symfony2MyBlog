<?php

namespace Vizitka\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleForm extends AbstractType {

    private $doctrine;

    public function __construct(RegistryInterface $doctrine) {
        $this->doctrine = $doctrine;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('id', 'hidden');
        $builder->add('title', 'text', array(
            'label' => 'Заголовок',
            'attr' => array("class" => "CustomClass"),
        ));
        $builder->add('preview', 'text', array('label' => 'Краткое описание'));
        $builder->add('article', 'textarea', array('label' => 'Текст статьи'));
        $builder->add('page_id', 'choice',  array('label' => 'Страница', 'choices' => $this->select()));
    }

    public function select() {
        $pages = $this->doctrine
                ->getRepository('VizitkaMainBundle:Pages')
                ->findAll();

        foreach ($pages as $p) {
            $PageSelect[$p->getId()] = $p->getName();
        }
        return $PageSelect;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        return array(
            'data_class' => 'Vizitka\MainBundle\Entity\Articles',
        );
    }

    public function getName() {
        return 'article_form';
    }

}