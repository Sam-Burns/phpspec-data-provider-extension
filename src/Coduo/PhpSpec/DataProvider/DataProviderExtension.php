<?php

namespace Coduo\PhpSpec\DataProvider;

use Coduo\PhpSpec\DataProvider\Listener\DataProviderListener;
use Coduo\PhpSpec\DataProvider\Runner\Maintainer\DataProviderMaintainer;
use PhpSpec\Extension;
use PhpSpec\ServiceContainer;

class DataProviderExtension implements Extension
{
    /**
     * @param ServiceContainer $container
     * @param array            $params
     */
    public function load(ServiceContainer $container, array $params = [])
    {
        $container->set('event_dispatcher.listeners.data_provider', function ($c) {
            return new DataProviderListener();
        });

        $container->set('runner.maintainers.data_provider', function ($c) {
            return new DataProviderMaintainer();
        });
    }
}
