<?php
namespace LeoGalleguillos\ThreeDimensions;

use LeoGalleguillos\ThreeDimensions\Model\Factory as ThreeDimensionsFactory;
use LeoGalleguillos\ThreeDimensions\Model\Table as ThreeDimensionsTable;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                ThreeDimensionsFactory\Mannequin::class => function ($serviceManager) {
                    return new ThreeDimensionsFactory\Mannequin(
                        $serviceManager->get(ThreeDimensionsTable\Mannequin::class)
                    );
                },
                ThreeDimensionsTable\Cube::class => function ($serviceManager) {
                    return new ThreeDimensionsTable\Cube(
                        $serviceManager->get('main')
                    );
                },
                ThreeDimensionsTable\Mannequin::class => function ($serviceManager) {
                    return new ThreeDimensionsTable\Mannequin(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
