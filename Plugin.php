<?php

namespace Kanboard\Plugin\Outlook;

use Kanboard\Core\Translator;
use Kanboard\Core\Plugin\Base;

/**
 * Outlook Plugin
 *
 * @package  outlook
 * @author   Siddharth Kaul
 */
class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attach('template:config:integrations', 'outlook:config/integration');
        $this->template->hook->attach('template:project:integrations', 'outlook:project/integration');
        $this->template->hook->attach('template:user:integrations', 'outlook:user/integration');

        $this->userNotificationTypeModel->setType('outlook', t('Outlook'), '\Kanboard\Plugin\Outlook\Notification\Outlook');
        $this->projectNotificationTypeModel->setType('outlook', t('Outlook'), '\Kanboard\Plugin\Outlook\Notification\Outlook');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginDescription()
    {
        return 'Receive notifications on Outlook';
    }

    public function getPluginAuthor()
    {
        return 'Siddharth Kaul';
    }

    public function getPluginVersion()
    {
        return '0.0.2';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/k10blogger/kanboard-plugin-outlook';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.37';
    }
}
