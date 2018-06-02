<?php
namespace LeoGalleguillos\ThreeDimensions;

use LeoGalleguillos\ThreeDimensions\Model\Factory as ThreeDimensionsFactory;
use LeoGalleguillos\ThreeDimensions\Model\Service as ThreeDimensionsService;
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
                ThreeDimensionsService\Mannequin\Json::class => function ($serviceManager) {
                    return new ThreeDimensionsService\Mannequin\Json(

                    );
                },
                ThreeDimensionsTable\Cube::class => function ($serviceManager) {
                    return new ThreeDimensionsTable\Cube(
                        $serviceManager->get('main')
                    );
                },
                ThreeDimensionsTable\Ground::class => function ($serviceManager) {
                    return new ThreeDimensionsTable\Ground(
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
