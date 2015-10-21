<?php


namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ClassificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'text', ['attr' => ['class' => 'form-control']])
            ->add('save', 'submit', ['attr' => ['class' => 'btn btn-lg btn-primary']]);
    }

    public function getName()
    {
        return 'classificationType';
    }

}