<?php

namespace Hm\CarroBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CarroType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('modelo')
            ->add('marca')
            ->add('anoFabricacao')
            ->add('estoque')
            ->add('foto')
            ->add('situacao')
            ->add('status')
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
    
    /**
     * @return string
     */
    public function getName(){
        return 'carro';
    }
}
