<?php


namespace AppBundle\Form\Type;
use AppBundle\Entity\Classification;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ClassificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'text', ['attr' => ['class' => 'form-control']])
            ->add('save', 'submit', ['attr' => ['class' => 'btn btn-lg btn-primary']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Classification::class,
        ]);
    }
    public function getName()
    {
        return 'classification';
    }

}