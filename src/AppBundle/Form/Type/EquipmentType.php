<?php


namespace AppBundle\Form\Type;
use AppBundle\Entity\Classification;
use AppBundle\Entity\Equipment;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EquipmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isoStandard', 'choice', [
                    'choices' => ['17025' => '17025', '9001' => '9001'],
                    'multiple' => false,
                    'expanded' => false,
                    'label' => 'Iso Standard',
                ])
//            ->add('isoStandard', 'text', array('attr' => array('class' => 'form-control')))
            ->add('equipmentId', 'text', array('attr' => array('class' => 'form-control')))
            ->add('description', 'text', array('attr' => array('class' => 'form-control')))
            ->add('model', 'text', array('attr' => array('class' => 'form-control')))
            ->add('serialNr', 'text', array('attr' => array('class' => 'form-control')))
            ->add('placement', 'text', array('attr' => array('class' => 'form-control')))
            ->add('partner', 'text', array('attr' => array('class' => 'form-control')))
            ->add('category', 'text', array('attr' => array('class' => 'form-control')))
            ->add('level', 'text', array('attr' => array('class' => 'form-control')))
            ->add('nextCalibration', 'date', array('attr' => array('class' => 'form-control')))
            ->add('calibrationInterval', 'text', array('attr' => array('class' => 'form-control')))
            ->add('calibrationInstitute', 'text', array('attr' => array('class' => 'form-control')))
            ->add('owner', 'text', array('attr' => array('class' => 'form-control')))
            ->add('isCalibrated', 'choice', [
                'choices' => ['no', 'yes'],
                'multiple' => false,
                'expanded' => true,
                'label' => 'is it calibrated?'
            ])
            ->add('boxStorage', 'choice', [
                'choices' => ['no', 'yes'],
                'multiple' => false,
                'expanded' => true,
                'label' => 'box storage',
            ])
            ->add('status', 'choice', [
                'choices' => ['inactive', 'active'],
                'multiple' => false,
                'expanded' => true,
                'label' => 'status'
            ])
            ->add('types', 'entity', [
                'class' => Classification::class,
                'choice_label' => 'type',
                'multiple' => true,
                'expanded' => false

            ])
//            ])
            ->add('comment', 'textarea', array('attr' => array('class' => 'form-control')))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-md')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Equipment::class,
        ]);
    }

    public function getName()
    {
        return 'equipment';
    }
}

