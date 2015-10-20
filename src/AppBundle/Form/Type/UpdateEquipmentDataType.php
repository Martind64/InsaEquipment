<?php


namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class EquipmentDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isoStandard', 'text', array('attr' => array('class' => 'form-control')))
            ->add('equipmentId', 'text', array('attr' => array('class' => 'form-control')))
            ->add('description', 'text', array('attr' => array('class' => 'form-control')))
            ->add('model', 'text', array('attr' => array('class' => 'form-control')))
            ->add('serialNr', 'text', array('attr' => array('class' => 'form-control')))
            ->add('placement', 'text', array('attr' => array('class' => 'form-control')))
            ->add('partner', 'text', array('attr' => array('class' => 'form-control')))
            ->add('category', 'text', array('attr' => array('class' => 'form-control')))
            ->add('level', 'text', array('attr' => array('class' => 'form-control')))
            ->add('nextCalibration', 'date', array('attr' => array('class' => 'form-control')))
            ->add('calibrationInterval', 'text', array('attr' => array('class' => 'form-control')))
            ->add('calibrationInstitute', 'text', array('attr' => array('class' => 'form-control')))
            ->add('owner', 'text', array('attr' => array('class' => 'form-control')))
            ->add('boxStorage', 'choice', [
                'choices' => ['no', 'yes'],
                'multiple' => false,
                'expanded' => true,
                'label' => 'box storage',
            ])
            ->add('status', 'choice', [
                'choices' => ['inactive', 'active'],
                'multiple' => false,
                'expanded' => true,
                'label' => 'status'
            ])
            ->add('comment', 'textarea', array('attr' => array('class' => 'form-control')))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-lg')));
    }
    public function getName()
    {
        return 'equipmentData';
    }
}

