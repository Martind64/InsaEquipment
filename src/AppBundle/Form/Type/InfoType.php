<?php


namespace AppBundle\Form\Type;
use AppBundle\Entity\Prefix;
use AppBundle\Entity\Unit;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class InfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unit', 'entity', [
                'class' => Unit::class,
                'property' => 'unit',
                'empty_value' => 'select unit',
                'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.unit', 'ASC');
                }
            ])
            ->add('prefix', 'entity', [
                'class' => prefix::class,
                'property' => 'prefix',
                'empty_value' => 'select prefix',
                'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.prefix', 'ASC');
                }
            ])
            ->add('measuredAt', 'text', array('attr' => array('class' => 'form-control')))
            ->add('uncertaintyRequests', 'text', array('attr' => array('class' => 'form-control')))
            ->add('actualUncertainty', 'text', array('attr' => array('class' => 'form-control')))
            ->add('labReference', 'text', array('attr' => array('class' => 'form-control')))
            ->add('uut', 'text', array('attr' => array('class' => 'form-control')))
            ->add('deviation', 'text', array('attr' => array('class' => 'form-control')))
            ->add('adjustmentLimit', 'text', array('attr' => array('class' => 'form-control')))
            ->add('comment', 'text', array('attr' => array('class' => 'form-control')))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-lg inline')));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Info::class,
        ]);
    }

    public function getName()
    {
        return 'info';
    }
}