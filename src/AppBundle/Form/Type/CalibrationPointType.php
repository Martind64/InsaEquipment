<?php



namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CalibrationPointType extends abstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('measurement', 'text', array('attr' => array('class' => 'form-control')))
            ->add('unit', 'text', array('attr' => array('class' => 'form-control')))
            ->add('prefix', 'text', array('attr' => array('class' => 'form-control')));
    }


    public function getName()
    {
        return 'calibrationPoint';
    }

}