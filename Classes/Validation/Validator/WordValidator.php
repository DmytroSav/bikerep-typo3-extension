<?php
namespace Rider\Bikerep\Validation\Validator;

class WordValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator 
{
    protected $supportedOptions = [
        'max' => [
            PHP_INT_MAX, 'The maximum allowed word counter', 'integer'
            ]
        ];

    public function isValid($property)
    {
        $max = $this->options['max'];

        if(str_word_count($property, 0) <= $max) {
            return TRUE;
        } else {
            $this->addError('too much words used here, max - ' .$max. '.', time());
            return FALSE;
        }
    }

}