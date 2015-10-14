<?php


namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class CalibrationInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unit', 'text', array('attr' => array('class' => 'form-control')))
            ->add('prefix', 'text', array('attr' => array('class' => 'form-control')))
            ->add('measuredAt', 'text', array('attr' => array('class' => 'form-control')))
            ->add('uncertaintyRequests', 'text', array('attr' => array('class' => 'form-control')))
            ->add('actualUncertainty', 'text', array('attr' => array('class' => 'form-control')))
            ->add('labReference', 'text', array('attr' => array('class' => 'form-control')))
            ->add('uut', 'text', array('attr' => array('class' => 'form-control')))
            ->add('deviation', 'text', array('attr' => array('class' => 'form-control')))
            ->add('adjustmentLimit', 'text', array('attr' => array('class' => 'form-control')))
            ->add('calibrationInstitute', 'text', array('attr' => array('class' => 'form-control')))
            ->add('approvedBy', 'text', array('attr' => array('class' => 'form-control')))
            ->add('comment', 'text', array('attr' => array('class' => 'form-control')))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-lg')));


    }
    public function getName()
    {
        return 'calibrationInfo';
    }
}