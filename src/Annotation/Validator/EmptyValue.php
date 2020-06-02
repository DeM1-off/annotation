<?php


namespace Budget\Annotation\Validator;

use Doctrine\Common\Annotations\Annotation;

/**
 * Class EmptyValue
 * @package Budget\Annotation\Validator
 *
 * @Annotation
 */
class EmptyValue
{
    public $message = 'Value is empty';
}