<?php
declare(strict_types=1);

use Helhum\TYPO3\ConfigHandling\Typo3SiteConfiguration;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use TYPO3\CMS\Core\Configuration\Event\SiteConfigurationLoadedEvent;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services->set(Typo3SiteConfiguration::class)
        ->tag('event.listener', [
            'identifier' => 'helhum/typo3-config-handling/site-configuration',
            'event' => SiteConfigurationLoadedEvent::class,
        ]);
};
