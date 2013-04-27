<?php

namespace Vizitka\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('roles');
        $builder->add('captcha', 'captcha', array(
        'label' => 'Проверочный код',
        'width' => 200,
        'height' => 50,
        'length' => 4,
        'required' => false,
        'keep_value' => false,
        'as_url' => true,
        'reload' => true,
        'invalid_message' => 'Ошибка ввода проверочного кода.',
    ));
    }

    public function getName()
    {
        return 'vizitka_user_registration';
    }
}