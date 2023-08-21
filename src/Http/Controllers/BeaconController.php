<?php

namespace Withcandour\Beacon\Http\Controllers;

use Illuminate\Routing\Controller;
use Withcandour\Beacon\Http\Services\BeaconService;

class BeaconController extends Controller
{
    public function __invoke()
    {
        $beacon = new BeaconService;

        return array_merge([
            'php' => $beacon->getPhpVersion(),
            'composer' => $composer = $beacon->getComposerDependencies(),
            'laravel' => $beacon->getLaravelVersion(),
            'statamic' => $beacon->getStatamicVersion($composer),
            'npm' => $beacon->getNpmDependencies(),
            'horizon' => $beacon->getHorizonStatus()
        ]);
    }
}