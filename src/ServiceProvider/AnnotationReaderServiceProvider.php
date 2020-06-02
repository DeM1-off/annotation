<?php


namespace Budget\ServiceProvider;


use Budget\Model\Budget;
use Doctrine\Common\Annotations\AnnotationReader;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class AnnotationReaderServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['annotations'] = $this->reader();
    }

    private function reader(): array
    {
        $reflection = new \ReflectionClass(Budget::class);

        $properties = $reflection->getProperties();

        $reader = new AnnotationReader();

        $annotationsData = [];

        /** @var \ReflectionProperty $property */
        foreach ($properties as $property)
        {
            $annotations = $reader->getPropertyAnnotations($property);
            if (empty($annotations)) {
                continue;
            }
            $annotationsData[$property->getName()] = $annotations[0];
        }

        return $annotationsData;
    }
}