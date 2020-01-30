<?php

namespace App\Form;

use App\Entity\Decoration;
use App\Entity\TYpeDeco;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DecorationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('picture')
            ->add('presentation')
            ->add('client')
            ->add('tyeDeco', EntityType::class,[
                 'ctegory' => TYpeDeco::class,
                 'choice_label' => function ($tyeDeco) {
        return $tyeDeco->getDisplayName();
    }
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Decoration::class,
        ]);
    }
}
