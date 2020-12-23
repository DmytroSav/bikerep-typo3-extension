<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Rider.Bikerep',
            'Bikerepfront',
            [
                'RepairRequests' => 'list, requestForm, create, show, updateForm, update, confirmDelete, delete'
            ],
            // non-cacheable actions
            [
                'RepairRequests' => 'list, requestForm, create, show, updateForm, update, confirmDelete, delete'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        bikerepfront {
                            iconIdentifier = bikerep-plugin-bikerepfront
                            title = LLL:EXT:bikerep/Resources/Private/Language/locallang_db.xlf:tx_bikerep_bikerepfront.name
                            description = LLL:EXT:bikerep/Resources/Private/Language/locallang_db.xlf:tx_bikerep_bikerepfront.description
                            tt_content_defValues {
                                CType = list
                                list_type = bikerep_bikerepfront
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'bikerep-plugin-bikerepfront',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:bikerep/Resources/Public/Icons/user_plugin_bikerepfront.svg']
			);
		
    }
);
