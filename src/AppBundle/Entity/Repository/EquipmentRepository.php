<?php

namespace AppBundle\Entity\Repository;
use Doctrine\ORM\Query\AST\Functions\CurrentDateFunction;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Validator\Constraints\Date;

/**
 * CalibrationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EquipmentRepository extends \Doctrine\ORM\EntityRepository
{

        public function findAllEquipment()
        {
            $query = $this->getEntityManager()
                ->createQuery('SELECT e FROM AppBundle:Equipment e
                               ORDER BY e.equipmentID *1');
            return $query->getResult();

        }

        public function findEquipmentJoinedWithTypes($id)
        {

            $query = $this->getEntityManager()
                ->createQuery('SELECT c FROM AppBundle:Classification c
                               JOIN c.equipment e
                               WHERE e.id = :id')->setParameter('id', $id);

            return $query->getResult();
        }

        public function getUpcomingCalibrations()
        {
            $date_from = new \DateTime();
            $date_to = new \DateTime();
            $date_to->modify('+60 day');

            $qb = $this->getEntityManager()
                ->createQueryBuilder();

            $query = $qb->select('e')
                ->from('AppBundle:Equipment', 'e')
                ->where('e.nextCalibration >= :date_from')
                ->andWhere($qb->expr()->between('e.nextCalibration', ':date_from', ':date_to'))
                ->setParameter('date_from', $date_from, \Doctrine\DBAL\Types\Type::DATETIME)
                ->setParameter('date_to', $date_to,\Doctrine\DBAL\Types\Type::DATETIME)
                ->orderBy('e.nextCalibration', 'ASC')
                ->getQuery();

            return $query->getResult();
        }



}
