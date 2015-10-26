<?php

namespace AppBundle\Entity\Repository;

/**
 * CalibrationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CalibrationRepository extends \Doctrine\ORM\EntityRepository
{


    public function findCalibrationInfo($id)
    {

        $query = $this->getEntityManager()
            ->createQuery('SELECT i FROM AppBundle:Info i
                            JOIN i.calibration c
                            JOIN i.prefix p
                            JOIN i.unit u
                            WHERE c.id = :id')->setParameter('id', $id);

        return $query->getResult();

    }




}
