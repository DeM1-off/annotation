<?php


namespace Budget\Service;


use Budget\Annotation\Validator\EmptyValue;
use Budget\Annotation\Validator\FloarValue;
use Budget\Annotation\Validator\Length;

class ValidatorService
{
    use ContainerTrait;

    /** @var array */
    private $annotations;

    /**
     * @param string $field
     * @param $value
     * @return bool
     */
    public function validate(string $field, $value)
    {
        $this->annotations = $this->getContainer()['annotations'];



        $fieldAnnotation = $this->annotations[$field];
        if ($fieldAnnotation instanceof Length) {
            $value = mb_strlen($value);
            if ($value > $fieldAnnotation->max) {
                throw new \InvalidArgumentException($fieldAnnotation->maxMessage);
            }
            if ($value < $fieldAnnotation->min) {
                throw new \InvalidArgumentException($fieldAnnotation->minMessage);

            }

        }
        /**
         * Validate empty
         */
        if ($fieldAnnotation instanceof EmptyValue) {
            if (empty($value)) {
                throw new \InvalidArgumentException($fieldAnnotation->message);
            }
        }
        /**
         * Validate float
         */
        if ($fieldAnnotation instanceof FloarValue) {
            if (is_float($value)) {
                throw new \InvalidArgumentException($fieldAnnotation->floatmessage);
            }
        }




        return true;
    }
}