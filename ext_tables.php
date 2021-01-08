<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Rider.Bikerep',
            'Bikerepfront',
            'Bike Repairing Requests'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('bikerep', 'Configuration/TypoScript', 'Bike Repair');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bikerep_domain_model_repairrequests', 'EXT:bikerep/Resources/Private/Language/locallang_csh_tx_bikerep_domain_model_repairrequests.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bikerep_domain_model_repairrequests');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bikerep_domain_model_bikemodel', 'EXT:bikerep/Resources/Private/Language/locallang_csh_tx_bikerep_domain_model_bikemodel.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bikerep_domain_model_bikemodel');

    }
);

        $pluginSignature = 'bikerep_bikerepfront';
        $TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 
        'FILE:EXT:bikerep/Configuration/FlexForms/flexform_bikerep.xml');