<?php


namespace Budget\Annotation\Validator;

use Doctrine\Common\Annotations\Annotation;

/**
 * Class Length
 * @package Budget\Annotation\Validator
 *
 * @Annotation
 */
class Length
{
    public $min;

    public $max;
    public $maxMessage = 'Value is too long';

    public $minMessage = 'Value is to short';
}


