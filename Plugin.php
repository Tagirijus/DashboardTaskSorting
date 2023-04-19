<?php

namespace Kanboard\Plugin\DashboardTaskSorting;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Plugin\DashboardTaskSorting\Pagination;


class Plugin extends Base
{
    public function initialize()
    {
        // Helper
        $this->helper->register(
            'dashboardTaskSortingHelper',
            '\Kanboard\Plugin\DashboardTaskSorting\Helper\DashboardTaskSortingHelper'
        );

        // CSS - Asset Hook
        $this->hook->on(
            'template:layout:css',
            array('template' => 'plugins/DashboardTaskSorting/Assets/css/dashboard-task-sorting.min.css')
        );

        // Views - Template hook
        $this->template->hook->attach(
            'template:config:sidebar', 'DashboardTaskSorting:config/dashboardtasksorting_config_sidebar'
        );

        // Template Override
        $this->template->setTemplateOverride('dashboard/tasks', 'DashboardTaskSorting:dashboard/tasks');

        // Controller override
        $this->container['dashboardPagination'] = $this->container->factory(function ($container) {
            return new Pagination\DashboardTaskSortingPagination($container);
        });
        $this->container['taskPagination'] = $this->container->factory(function ($container) {
            return new Pagination\DashboardTaskSortingTaskPagination($container);
        });

        // Extra Page - Routes
        $this->route->addRoute('/dashboardtasksorting/config', 'DashboardTaskSortingController', 'show', 'DashboardTaskSorting');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'DashboardTaskSorting';
    }

    public function getPluginDescription()
    {
        return t('DashboardTaskSorting changes the default sorting for tasks on the main dashboard to 1. due date ASC and 2. priority DESC: for both, the overview and the tasks site.');
    }

    public function getPluginAuthor()
    {
        return 'Tagirijus';
    }

    public function getPluginVersion()
    {
        return '1.4.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/tagirijus/DashboardTaskSorting';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.26';
    }
}