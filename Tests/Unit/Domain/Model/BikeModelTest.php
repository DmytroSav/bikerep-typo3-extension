<?php
namespace Rider\Bikerep\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author tim <tim@mm.ll>
 */
class BikeModelTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Rider\Bikerep\Domain\Model\BikeModel
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Rider\Bikerep\Domain\Model\BikeModel();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getModelReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getModel()
        );
    }

    /**
     * @test
     */
    public function setModelForStringSetsModel()
    {
        $this->subject->setModel('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'model',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCcReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getCc()
        );
    }

    /**
     * @test
     */
    public function setCcForIntSetsCc()
    {
        $this->subject->setCc(12);

        self::assertAttributeEquals(
            12,
            'cc',
            $this->subject
        );
    }
}
