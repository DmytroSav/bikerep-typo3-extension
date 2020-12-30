<?php
namespace Rider\Bikerep\Domain\Model;


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
 * requests dashboard
 */
class RepairRequests extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     * 
     * @var string
     */
    protected $title = '';

    /**
     * request
     * 
     * @var string
     */
    protected $request = '';

    /**
     * phone
     * 
     * @var string
     */
    protected $phone = 0;

    /**
     * email
     * 
     * @var string
     */
    protected $email = '';

    /**
     * model
     * 
     * @var \Rider\Bikerep\Domain\Model\BikeModel
     */
    protected $model = null;

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the request
     * 
     * @return string $request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Sets the request
     * 
     * @param string $request
     * @return void
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the phone
     * 
     * @return string phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets the phone
     * 
     * @param int $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Returns the model
     * 
     * @return \Rider\Bikerep\Domain\Model\BikeModel $model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets the model
     * 
     * @param \Rider\Bikerep\Domain\Model\BikeModel $model
     * @return void
     */
    public function setModel(\Rider\Bikerep\Domain\Model\BikeModel $model)
    {
        $this->model = $model;
    }
}
