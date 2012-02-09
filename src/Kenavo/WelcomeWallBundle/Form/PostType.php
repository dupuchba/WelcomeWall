<?php

namespace Kenavo\WelcomeWallBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PostType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('message')
            ->add('latitude')
            ->add('longitude')
            ->add('createdAt')
        ;
    }

    public function getName()
    {
        return 'kenavo_welcomewallbundle_posttype';
    }
}
