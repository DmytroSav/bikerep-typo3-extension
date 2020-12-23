<?php
namespace Rider\Bikerep\Controller;


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
 * RepairRequestsController
 */
class RepairRequestsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * repairRequestsRepository
     * 
     * @var \Rider\Bikerep\Domain\Repository\RepairRequestsRepository
     */
    protected $repairRequestsRepository = null;

    /**
     * @param \Rider\Bikerep\Domain\Repository\RepairRequestsRepository $repairRequestsRepository
     */
    public function injectRepairRequestsRepository(\Rider\Bikerep\Domain\Repository\RepairRequestsRepository $repairRequestsRepository)
    {
        $this->repairRequestsRepository = $repairRequestsRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $repairRequests = $this->repairRequestsRepository->findAll();
        $this->view->assign('repairRequests', $repairRequests);
    }

    /**
     * action show
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $repairRequests
     * @return void
     */
    public function showAction(\Rider\Bikerep\Domain\Model\RepairRequests $request)
    {
        $this->view->assign('request', $request);
    }

     /**
     * action create
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $newRepairRequests
     * @return void
     */
    public function createAction(\Rider\Bikerep\Domain\Model\RepairRequests $newRepairRequest)
    {
        $this->repairRequestsRepository->add($newRepairRequest);
        $this->redirect('list');
    }

     /**
     * action createForm
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $newRepairRequests
     * @return void
     */
    public function requestFormAction(\Rider\Bikerep\Domain\Model\RepairRequests $newRepairRequest=null)
    {
        $this->view->assign('request', $newRepairRequest);
    }


    /**
     * action edit
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $repairRequests
     * @ignorevalidation $repairRequests
     * @return void
     */
    public function updateFormAction(\Rider\Bikerep\Domain\Model\RepairRequests $request)
    {
        $this->view->assign('repairRequest', $request);
    }

    /**
     * action update
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $repairRequests
     * @return void
     */
    public function updateAction(\Rider\Bikerep\Domain\Model\RepairRequests $repairRequest)
    {
        $this->repairRequestsRepository->update($repairRequest);
        $this->redirect('list');
    }

     /**
     * action delete
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $request
     * @return void
     */
    public function confirmDeleteAction(\Rider\Bikerep\Domain\Model\RepairRequests $request)
    {
        $this->view->assign('request', $request);
    }

    /**
     * action delete
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $request
     * @return void
     */
    public function deleteAction(\Rider\Bikerep\Domain\Model\RepairRequests $request)
    {
        $this->repairRequestsRepository->remove($request);
        $this->redirect('list');
    }
}
