<?php
namespace LeoGalleguillos\ThreeDimensions;

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
                ThreeDimensionsTable\Cube::class => function ($serviceManager) {
                    return new ThreeDimensionsTable\Cube(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
