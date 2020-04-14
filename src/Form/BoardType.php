<?php

namespace App\Form;

use App\Entity\Board;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usualName')
            ->add('observation')
            ->add('progress')
            ->add('typology')
            ->add('approval')
            ->add('domain')
            ->add('typologySI')
            ->add('location')
            ->add('entity')
            ->add('technology')
            ->add('network')
            ->add('leaf', null, ['choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Board::class,
        ]);
    }
}
