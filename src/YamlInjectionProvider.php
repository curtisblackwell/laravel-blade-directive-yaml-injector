<?php

namespace CurtisBlackwell;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Symfony\Component\Yaml\Yaml;

class YamlInjectionProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('yaml', function ($args) {
            list($var, $file) = explode(',', str_replace(['\'', ' '], '', $args));

            $data = Yaml::parse(file_get_contents(resource_path(
                'views/' . str_replace(['.', '//'], ['/', '/'], $file) . '.yaml'
            )));

            return '<?php $' . $var . ' = ' . var_export($data, true) . '; ?>';
        });
    }
}
