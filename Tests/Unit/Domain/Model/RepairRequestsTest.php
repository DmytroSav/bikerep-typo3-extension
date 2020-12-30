<?php
namespace Rider\Bikerep\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author tim <tim@mm.ll>
 */
class RepairRequestsTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Rider\Bikerep\Domain\Model\RepairRequests
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Rider\Bikerep\Domain\Model\RepairRequests();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRequestReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRequest()
        );
    }

    /**
     * @test
     */
    public function setRequestForStringSetsRequest()
    {
        $this->subject->setRequest('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'request',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPhoneReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPhone()
        );
    }

    /**
     * @test
     */
    public function setPhoneForStringSetsPhone()
    {
        $this->subject->setPhone('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'phone',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getModelReturnsInitialValueForBikeModel()
    {
        self::assertEquals(
            null,
            $this->subject->getModel()
        );
    }

    /**
     * @test
     */
    public function setModelForBikeModelSetsModel()
    {
        $modelFixture = new \Rider\Bikerep\Domain\Model\BikeModel();
        $this->subject->setModel($modelFixture);

        self::assertAttributeEquals(
            $modelFixture,
            'model',
            $this->subject
        );
    }
}
