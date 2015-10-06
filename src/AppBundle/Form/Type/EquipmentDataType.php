<?php


namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class EquipmentDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('equipmentId', 'text', array('attr' => array('class' => 'form-control')))
            ->add('description', 'text', array('attr' => array('class' => 'form-control')))
            ->add('model', 'text', array('attr' => array('class' => 'form-control')))
            ->add('serialNr', 'text', array('attr' => array('class' => 'form-control')))
            ->add('placement', 'text', array('attr' => array('class' => 'form-control')))
            ->add('partner', 'text', array('attr' => array('class' => 'form-control')))
            ->add('category', 'text', array('attr' => array('class' => 'form-control')))
            ->add('level', 'text', array('attr' => array('class' => 'form-control')))
            ->add('doneBy', 'text', array('attr' => array('class' => 'form-control')))
            ->add('approvedBy', 'text', array('attr' => array('class' => 'form-control')))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-lg')));
    }
    public function getName()
    {
        return 'equipmentData';
    }
}

