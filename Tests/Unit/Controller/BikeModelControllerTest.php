<?php
namespace Rider\Bikerep\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author tim <tim@mm.ll>
 */
class BikeModelControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Rider\Bikerep\Controller\BikeModelController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Rider\Bikerep\Controller\BikeModelController::class)
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
    public function listActionFetchesAllBikeModelsFromRepositoryAndAssignsThemToView()
    {

        $allBikeModels = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $bikeModelRepository = $this->getMockBuilder(\::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $bikeModelRepository->expects(self::once())->method('findAll')->will(self::returnValue($allBikeModels));
        $this->inject($this->subject, 'bikeModelRepository', $bikeModelRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('bikeModels', $allBikeModels);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
