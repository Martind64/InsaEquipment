<?php


namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class CalibrationInfoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('uncertaintyRequests', 'text', array('class' => 'form-control'))
            ->add('actualUncertainty', 'text', array('class' => 'form-control'))
            ->add('referenceNr', 'text', array('class' => 'form-control'))
            ->add('uut', 'text', array('class' => 'form-control'))
            ->add('deviation', 'text', array('class' => 'form-control'))
            ->add('adjustmentLimit', 'text', array('class' => 'form-control'))
            ->add('comment', 'text', array('class' => 'form-control'));

    }


    public function getName()
    {
        return 'calibrationInfo';
    }
}