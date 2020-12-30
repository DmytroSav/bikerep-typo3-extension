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
 * BikeModel
 */
class BikeModel extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * model
     * 
     * @var string
     */
    protected $model = '';

    /**
     * cc
     * 
     * @var int
     */
    protected $cc = 0;

    /**
     * Returns the model
     * 
     * @return string $model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets the model
     * 
     * @param string $model
     * @return void
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * Returns the cc
     * 
     * @return int $cc
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Sets the cc
     * 
     * @param int $cc
     * @return void
     */
    public function setCc($cc)
    {
        $this->cc = $cc;
    }
}
