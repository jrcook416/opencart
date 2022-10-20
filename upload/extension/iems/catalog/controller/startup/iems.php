<?php
namespace Opencart\Catalog\Controller\Extension\iems\Startup;

class IEMS extends \Opencart\System\Engine\Controller
{
    public function index(): void
    {
        if ($this->config->get('theme_iems_status')) {
            $this->event->register('view/*/before', new \Opencart\System\Engine\Action('extension/iems/startup/iems.event'));
        }
    }

    public function event(string &$route, array &$args, mixed &$output): void
    {
        $override = [
            'common/header',
        ];

        if (in_array($route, $override)) {
            $route = 'extension/iems/' . $route;
        }
    }
}
