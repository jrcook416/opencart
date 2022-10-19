<?php
namespace Opencart\Catalog\Controller\Extension\webocreation4\Startup;

class Standard extends \Opencart\System\Engine\Controller
{
    public function index(): void
    {
        if ($this->config->get('theme_webo_status')) {
            $this->event->register('view/*/before', new \Opencart\System\Engine\Action('extension/webocreation4/startup/webo|event'));
        }
    }

    public function event(string &$route, array &$args, mixed &$output): void
    {
        $override = [
            'common/header',
        ];

        if (in_array($route, $override)) {
            $route = 'extension/webocreation4/' . $route;
        }
    }
}
