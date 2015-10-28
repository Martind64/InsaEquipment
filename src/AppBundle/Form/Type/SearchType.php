<?php


namespace AppBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('search', 'search', ['attr' => ['class' => 'form-control']]);

    }

    public function getName()
    {
        return 'search';
    }
}