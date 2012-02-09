<?php

namespace Kenavo\WelcomeWallBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('comment')
            ->add('createdAt')
            ->add('post')
        ;
    }

    public function getName()
    {
        return 'kenavo_welcomewallbundle_commenttype';
    }
}
