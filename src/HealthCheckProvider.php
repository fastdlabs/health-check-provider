<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2018
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace FastD\HealthCheckProvider;


use FastD\Container\Container;
use FastD\Container\ServiceProviderInterface;

class HealthCheckProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     * @return mixed
     */
    public function register(Container $container)
    {
        $response = function () {
            return json([
                'version' => version(),
                'app' => app()->getName(),
            ]);
        };

        route()->get('/health-check', $response);
        route()->head('/health-check', $response);
    }
}