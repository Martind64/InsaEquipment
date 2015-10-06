<?php


namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', 'text', array('attr' => array('class' => 'form-control')));

    }
    public function getName()
    {
        return 'EquipmentData';
    }
}
//->add('name', 'text', array('attr' => array('class' => 'form-control')))
//->add('age', 'integer', array('attr' => array('class' => 'form-control')))
//->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-lg')));
