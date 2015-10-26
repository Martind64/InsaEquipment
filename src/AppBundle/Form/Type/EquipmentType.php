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
            ->add('isoStandard', 'text', array('attr' => array('class' => 'form-control')))
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
                'class' => 'AppBundle:Classification',
                'property' => 'type',
                'multiple' => true,
                'expanded' => true
            ])
//            ->add('types', 'entity', [
//                'class' => Equipment::class,
//                'property' => 'types',
//                'empty_value' => 'select type',
//                'query_builder' => function(EntityRepository $er){
//                    return $er->createQueryBuilder('c')
//                    ->orderBy('c.type', 'ASC');
//                }
//            ])
//            ->add('equipmentID', 'entity', [
//                'class' => Equipment::class,
//                'property' => 'equipmentID',
//                'empty_value' => 'select id',
//                'query_builder' => function(EntityRepository $er){
//                    return $er->createQueryBuilder('c')
//                    ->orderBy('c.equipmentID', 'ASC');
//                }
//            ])
            ->add('comment', 'textarea', array('attr' => array('class' => 'form-control')))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary btn-lg')));
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

