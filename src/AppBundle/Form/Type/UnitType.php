<?php


namespace AppBundle\Form\Type;
use AppBundle\Entity\Unit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UnitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unit', 'text', ['attr' => ['class' => 'form-control']])
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-md')));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Unit::class,
        ]);
    }

    public function getName()
    {
        return 'unit';
    }
}
