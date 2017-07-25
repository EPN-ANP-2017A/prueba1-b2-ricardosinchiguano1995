<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PedidoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cantidad')

            ->add('cliente', EntityType::class, array(
                // query choices from this entity
                'class' => 'AppBundle:Cliente',

                // use the Category.nombre property as the visible option string
                'choice_label' => function ($cliente) {
                    return $cliente->getNombre();
                },

                // used to render a select box, check boxes or radios
                // uncomment both lines to render as checkboxes
                // 'multiple' => true, // <===== uncomment this to render as multiple choice list
                // 'expanded' => true, // <===== uncomment this to render as radios
            ))
            ->add('plato', EntityType::class, array(
                // query choices from this entity
                'class' => 'AppBundle:Plato',

                // use the Category.nombre property as the visible option string
                'choice_label' => function ($plato) {
                    return $plato->getNombre();
                },

                // used to render a select box, check boxes or radios
                // uncomment both lines to render as checkboxes
                // 'multiple' => true, // <===== uncomment this to render as multiple choice list
                // 'expanded' => true, // <===== uncomment this to render as radios
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Pedido'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_pedido';
    }


}
