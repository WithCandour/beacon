<?php
namespace Withcandour\Beacon\Http\Services;

use Illuminate\Support\Facades\Artisan;

class BeaconService 
{
    public function getLaravelVersion() : string
    {
        return app()->version();
    }

    public function getComposerDependencies() : array
    {
        return json_decode(
            file_get_contents(
                base_path('composer.json')
            ),
            true
        );
    }

    public function getNpmDependencies() : array
    {
        return json_decode(
            file_get_contents(
                base_path('package.json')
            ),
            true
        );
    }

    public function getPhpVersion() : string
    {
        return phpversion();
    }

    public function getStatamicVersion(array $composerArray) : string
    {
        return $composerArray['require']['statamic/cms'];
    }

    public function getHorizonStatus() : string
    {
        return Artisan::call('horizon:status'); 
    }
}
