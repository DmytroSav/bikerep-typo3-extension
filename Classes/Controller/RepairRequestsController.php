<?php
namespace Rider\Bikerep\Controller;

use Rider\Bikerep\Domain\Model\RepairRequests;
use Rider\Bikerep\Domain\Model\BikeModel as Model;


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
     * action list all requests
     * 
     * 
     * @param string $search
     * 
     * @return void
     */
    public function listAction($search='')
    {

        $limit = $this->settings['requests']['max'];
        $repairRequests = $this->repairRequestsRepository->findInfoByTitle($search, $limit);

        $this->view->assign('repairRequests', $repairRequests);
        $this->view->assign('search', $search);
        $this->view->assign('list-class', 'list-group');
    }

    public function checkAjax()
    {
   $responseData =   json_encode([
            'status' => 'OK',
            'data' => [
                'user'=> 'John Doe',
                'Message' => 'Hello world'
           ]
        ], JSON_UNESCAPED_UNICODE);

        $response->getBody()->write($this->createSuccessResponseObject($responseData));
        return $response
            ->withStatus(200)
            ->withHeader('Content-Type', 'application/json');
    }


    /**
     * action search using ajax requests
     * 
     *  
     * @return void
     */
    public function ajaxSearchAction($search='')
    {
        $repairRequests = $this->repairRequestsRepository->findInfoByTitle($search);

        foreach ($repairRequests as $rr) {

            $json[] = [
                'title' => $rr->getTitle(),
                'model' => [
                    'cc' => $rr->getModel()->getCc(),
                    'model'=> $rr->getModel()->getModel(),
                ],
                'phone' => $rr->getPhone()
            ];
         }

        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings);


        return json_encode($json);
    }

    /**
     * action shows the request body
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $repairRequests
     * @return void
     */
    public function showAction(\Rider\Bikerep\Domain\Model\RepairRequests $request)
    {
        $this->view->assign('request', $request);
    }

    /**
     * action creates form for a request 
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $newRepairRequests
     * @return void
     */
    public function requestFormAction(RepairRequests $newRepairRequest=null)
    {
        $this->view->assign('request', $newRepairRequest);
    }

    /**
     * action creates a request
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $newRepairRequests
     * 
     * @return void
     */
    public function createAction(RepairRequests $request)
    {
        $this->repairRequestsRepository->add($request);

        $this->redirect('list');
    }

    /**
     * action show updates form
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $repairRequests
     * @ignorevalidation $repairRequests
     * @return void
     */
    public function updateFormAction(\Rider\Bikerep\Domain\Model\RepairRequests $request)
    {
        $this->view->assign('request', $request);
    }

    /**
     * action update
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $repairRequests
     * @return void
     */
    public function updateAction(RepairRequests $request)
    {
        $this->repairRequestsRepository->update($request);
        $this->redirect('list');
    }

    /**
     * action confirm request delete
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $request
     * @return void
     */
    public function confirmDeleteAction(RepairRequests $request)
    {
        $this->view->assign('request', $request);
    }

    /**
     * action  request delete
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $request
     * @return void
     */
    public function deleteAction(RepairRequests $request)
    {
        $this->repairRequestsRepository->remove($request);
        $this->objectManager->get('Rider\\Bikerep\\Domain\\Repository\\BikeModelRepository')->remove($request->getModel());
        $this->redirect('list');
    }

    /**
     * action confirm delete all records
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $requests
     * @return void
     */
    public function confirmDeleteAllAction(RepairRequests $requests = null)
    {
        $this->view->assign('requests', $requests);
    }

    /**
     * action deletes all records
     * 
     * @param \Rider\Bikerep\Domain\Model\RepairRequests $request
     * @return void
     */
    public function deleteAllAction()
    {
        $this->repairRequestsRepository->removeAll();
        $this->objectManager->get('Rider\\Bikerep\\Domain\\Repository\\BikeModelRepository')->removeAll();
        $this->redirect('list');
    }
}
