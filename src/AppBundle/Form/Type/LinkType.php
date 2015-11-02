<?php


namespace AppBundle\Form\Type;
use AppBundle\Entity\LinkClassification;
use Doctrine\ORM\EntityRepository;
use Proxies\__CG__\AppBundle\Entity\Equipment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class LinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('equipment', 'entity', [
                'class' => Equipment::class,
                'property' => 'link',
                'empty_value' => 'select equipment',
                'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('e')
                        ->orderBy('e.equipmentID', 'ASC');
                }
            ])
            ->add('type', 'entity', [
                'class' => LinkClassification::class,
                'property' => 'type',
                'empty_value' => 'select type',
                'query_builder' => function(EntityRepository $er)
                {
                    return $er->createQueryBuilder('l')
                        ->orderBy('l.type', 'ASC');
                }

            ])
            ->add('link', 'file', ['attr' => ['class' => 'form-control']])
            ->add('save', 'submit'. ['attr' => ['class' => 'form-control']]);

    }

    public function getName()
    {
        return 'link';
    }
}