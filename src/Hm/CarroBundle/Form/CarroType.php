<?php

namespace Hm\CarroBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarroType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marca')
            ->add('modelo')
            ->add('combustivel')
            ->add('anoFabricacao')
            ->add('anoModelo')
            ->add('corPredominante')
            ->add('estoque')
            ->add('foto')
            ->add('status')
            ->add('image')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hm\CarroBundle\Entity\Carro'
        ));
    }
}
