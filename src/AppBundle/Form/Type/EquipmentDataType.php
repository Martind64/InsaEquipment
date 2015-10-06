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
            ->add('serialnr', 'text', array('attr' => array('class' => 'form-control')))
            ->add('placement', 'text', array('attr' => array('class' => 'form-control')))
            ->add('partner', 'text', array('attr' => array('class' => 'form-control')))
            ->add('category', 'text', array('attr' => array('class' => 'form-control')))
            ->add('level', 'text', array('attr' => array('class' => 'form-control')))
            ->add('doneby', 'text', array('attr' => array('class' => 'form-control')))
            ->add('approvedby', 'text', array('attr' => array('class' => 'form-control')))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-lg')));
    }
    public function getName()
    {
        return 'equipmentData';
    }
}


//->add('name', 'text', array('attr' => array('class' => 'form-control')))
//->add('age', 'integer', array('attr' => array('class' => 'form-control')))
//->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-lg')));
//protected $equipmentID;
//protected $description;
//protected $model;
//protected $serialNr;
//protected $placement;
//protected $partner;
//protected $category;
//protected $level;
//protected $doneBy;
//protected $approvedBy;