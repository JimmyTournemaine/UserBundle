<?php

namespace JT\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', 'choice', array(
            		'label' => 'profile.gender',
            		'choices' => array('m'=> 'Homme', 'f'=>'Femme'),
            		'empty_value' => 'profile.unknown',
            		'error_bubbling' => true
            ))
            ->add('firstname', 'text', array(
            		'label' => 'profile.firstname',
            		'error_bubbling' => true
            ))
            ->add('lastname', 'text', array(
            		'label' => 'profile.lastname',
            		'error_bubbling' => true
            ))
            ->add('dateOfBirth', null, array(
            		'label' => 'profile.dateOfBirth',
            		'widget' => 'single_text',
            		'empty_value' => 'profile.unknown',
            		'datepicker' => true,
            		'error_bubbling' => true,
            ))
            ->add('address', 'text', array(
            		'label' => 'profile.address'
            ))
            ->add('country', 'country', array(
            		'label' => 'profile.country',
            		'empty_value' => '-',
            		'error_bubbling' => true
            ))
            ->add('locale', 'locale', array(
            		'label' => 'profile.locale',
            		'empty_value' => '-',
            		'error_bubbling' => true
            ))
            ->add('timezone', 'timezone', array(
            		'label' => 'profile.timezone',
            		'empty_value' => '-',
            		'error_bubbling' => true
            ))
            ->add('website', 'text', array(
            		'label' => 'profile.website',
            		'error_bubbling' => true
            ))
            ->add('biography', 'textarea', array(
            		'label' => 'profile.biography',
            		'error_bubbling' => true
            ))
            ->add('phones','collection', array(
            		'label' => 'profile.phones.label',
            		'type' => new PhoneNumberType(),
            		'allow_add' => true,
            		'allow_delete' => true,
            		'prototype' => true,
            		'widget_add_btn' => array('label' => 'profile.phones.add'),
            		'cascade_validation' => true,
            		'options' => array(
            			'label_render' => false,
            			'horizontal_input_wrapper_class' => "col-lg-8",
            			'widget_remove_btn' => array('label' => 'profile.phones.remove')
            		),
            		'attr' => array(
            			'class' => 'form-inline'
            		),
            ))
            ->add('facebookName', 'text', array(
            		'label' => 'profile.facebookName',
            		'error_bubbling' => true
            ))
            ->add('twitterName', 'text', array(
            		'label' => 'profile.twitterName',
            		'error_bubbling' => true
            ))
            ->add('gplusName', 'text', array(
            		'label' => 'profile.gplusName',
            		'error_bubbling' => true
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults(array(
    			'data_class' => 'JT\UserBundle\Entity\User'
    	));
    }

    public function getName()
    {
        return 'jt_user_profile';
    }
}
