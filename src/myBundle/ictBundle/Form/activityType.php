<?php

namespace myBundle\ictBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class activityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('programname')
            ->add('programdetail')
            ->add('contact')
            ->add('duration')
            ->add('agegroup')
            ->add('gender')
            ->add('location')
            ->add('eventdates')
            ->add('url')
            ->add('popular')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'myBundle\ictBundle\Entity\activity'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mybundle_ictbundle_activity';
    }
}
