<?php


namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class UnitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unit', 'text', ['attr' => ['class' => 'form-control']])
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-lg')));

    }

    public function getName()
    {
        return 'unit';
    }
}
