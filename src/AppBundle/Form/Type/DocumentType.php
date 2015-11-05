<?php


namespace AppBundle\Form\Type;
use AppBundle\Entity\DocumentClassification;
use Doctrine\ORM\EntityRepository;
use Proxies\__CG__\AppBundle\Entity\Equipment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class DocumentType extends AbstractType
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
                    return $er->createQueryBuilder('e')
                        ->orderBy('e.equipmentID', 'ASC');
                }
            ])
            ->add('documentClassification', 'entity', [
                'class' => DocumentClassification::class,
                'property' => 'type',
                'empty_value' => 'select type',
                'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('l')
                        ->orderBy('l.type', 'ASC');
                }

            ])
            ->add('path', 'file', [
                'attr' => ['class' => 'form-control'],

            ])
            ->add('save', 'submit', ['attr' => ['class' => 'btn btn-lg btn-primary']]);

    }

    public function getName()
    {
        return 'document';
    }
}