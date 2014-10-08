<?php

namespace myBundle\ictBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class teacherType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('topic')
            ->add('detail')
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
            'data_class' => 'myBundle\ictBundle\Entity\teacher'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mybundle_ictbundle_teacher';
    }
}
