<?php
declare(strict_types=1);

namespace Helhum\TYPO3\ConfigHandling;

use Helhum\ConfigLoader\Processor\PlaceholderValue;
use TYPO3\CMS\Core\Configuration\Event\SiteConfigurationLoadedEvent;

final class Typo3SiteConfiguration
{
    public function __invoke(SiteConfigurationLoadedEvent $event): void
    {
        $event->setConfiguration(
            (new PlaceholderValue(false))->processConfig(
                array_replace_recursive(
                    $event->getConfiguration(),
                    $GLOBALS['TYPO3_CONF_VARS']['Site'][$event->getSiteIdentifier()] ?? []
                )
            )
        );
    }
}
