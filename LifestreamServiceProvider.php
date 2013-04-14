<?php

namespace Lyrixx\Lifestream\Silex\Provider;

use Guzzle\Http\Client;
use Lyrixx\Lifestream\LifestreamFactory;
use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LifestreamServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['lifestream.client'] = $app->share(function() {
            return new Client();
        });

        $app['lifestream.factory'] = $app->share(function($app) {
            return new LifestreamFactory($app['lifestream.client']);
        });
    }

    public function boot(Application $app)
    {
    }
}
