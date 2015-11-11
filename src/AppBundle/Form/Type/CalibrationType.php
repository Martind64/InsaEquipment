<?php


namespace AppBundle\Form\Type;
use AppBundle\Entity\Equipment;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class CalibrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('equipment', 'entity', [
                'class' => Equipment::class,
                'property' => 'equipmentID',
                'empty_value' => 'select equipment',
                'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.equipmentID * 1');
                }
            ])
            ->add('calibrationDate', 'date', ['attr' => ['class' => 'form-control']])
            ->add('calibrationInstitute', 'text', array('attr' => array('class' => 'form-control')))
            ->add('approvedBy', 'text', array('attr' => array('class' => 'form-control')))
            ->add('status', 'choice', [
                'choices' => ['inactive', 'active'],
                'multiple' => false,
                'expanded' => true,
                'label' => 'status'
            ])
            ->add('save', 'submit', ['attr' => ['class' => 'btn btn-lg btn-primary']]);

    }

    public function getName()
    {
        return 'calibration';
    }
}