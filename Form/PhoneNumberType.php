<?php

namespace JT\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhoneNumberType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'choice', array(
            		'label' => false,
            		'choices' => array(
            			'home' => 'profile.phones.home',
            			'mobile' => 'profile.phones.mobile'
            		),
            ))
            ->add('number', 'text', array(
            		'label' => false,
            		'widget_addon_append' => array(
            				'icon' => 'phone',
            		),
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JT\UserBundle\Entity\PhoneNumber'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jt_userbundle_phonenumber';
    }
}
