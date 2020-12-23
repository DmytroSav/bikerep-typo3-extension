<?php
namespace Rider\Bikerep\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author tim <tim@mm.ll>
 */
class RepairRequestsControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Rider\Bikerep\Controller\RepairRequestsController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Rider\Bikerep\Controller\RepairRequestsController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllRepairRequestssFromRepositoryAndAssignsThemToView()
    {

        $allRepairRequestss = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $repairRequestsRepository = $this->getMockBuilder(\Rider\Bikerep\Domain\Repository\RepairRequestsRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $repairRequestsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allRepairRequestss));
        $this->inject($this->subject, 'repairRequestsRepository', $repairRequestsRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('repairRequestss', $allRepairRequestss);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenRepairRequestsToView()
    {
        $repairRequests = new \Rider\Bikerep\Domain\Model\RepairRequests();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('repairRequests', $repairRequests);

        $this->subject->showAction($repairRequests);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenRepairRequestsToRepairRequestsRepository()
    {
        $repairRequests = new \Rider\Bikerep\Domain\Model\RepairRequests();

        $repairRequestsRepository = $this->getMockBuilder(\Rider\Bikerep\Domain\Repository\RepairRequestsRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $repairRequestsRepository->expects(self::once())->method('add')->with($repairRequests);
        $this->inject($this->subject, 'repairRequestsRepository', $repairRequestsRepository);

        $this->subject->createAction($repairRequests);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenRepairRequestsToView()
    {
        $repairRequests = new \Rider\Bikerep\Domain\Model\RepairRequests();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('repairRequests', $repairRequests);

        $this->subject->editAction($repairRequests);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenRepairRequestsInRepairRequestsRepository()
    {
        $repairRequests = new \Rider\Bikerep\Domain\Model\RepairRequests();

        $repairRequestsRepository = $this->getMockBuilder(\Rider\Bikerep\Domain\Repository\RepairRequestsRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $repairRequestsRepository->expects(self::once())->method('update')->with($repairRequests);
        $this->inject($this->subject, 'repairRequestsRepository', $repairRequestsRepository);

        $this->subject->updateAction($repairRequests);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenRepairRequestsFromRepairRequestsRepository()
    {
        $repairRequests = new \Rider\Bikerep\Domain\Model\RepairRequests();

        $repairRequestsRepository = $this->getMockBuilder(\Rider\Bikerep\Domain\Repository\RepairRequestsRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $repairRequestsRepository->expects(self::once())->method('remove')->with($repairRequests);
        $this->inject($this->subject, 'repairRequestsRepository', $repairRequestsRepository);

        $this->subject->deleteAction($repairRequests);
    }
}
