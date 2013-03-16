<?php

namespace Crina\SiteManagement\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {       
        $builder->add('name', 'text', array('constraints' => new \Symfony\Component\Validator\Constraints\NotBlank));
        $builder->add('url', 'text', array('constraints' => new \Symfony\Component\Validator\Constraints\NotBlank));
        $builder->add('is_active');
        $builder->add('created_at', 'date');
    }   

    public function getName()
    {
        return 'site';
    }
}