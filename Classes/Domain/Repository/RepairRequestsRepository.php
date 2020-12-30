<?php
namespace Rider\Bikerep\Domain\Repository;


/***
 *
 * This file is part of the "Bike Repair" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 tim <tim@mm.ll>, res
 *
 ***/
/**
 * The repository for RepairRequests
 */
class RepairRequestsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function findInfoByTitle($search)
    {
        $query = $this->createQuery();
        $query->matching(
            $query->like('title', '%'.$search.'%')
        );
        $query->setOrderings(['title'=>\TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
        $query->setLimit(5);

        return $query->execute();
    }
}
