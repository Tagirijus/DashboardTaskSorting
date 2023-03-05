<?php

namespace Kanboard\Plugin\TagiDashboardTaskSorting;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TagiDashboardTaskSorting\Pagination;


class Plugin extends Base
{
    public function initialize()
    {
        $this->container['dashboardPagination'] = $this->container->factory(function ($container) {
            return new Pagination\TagiDashboardTaskSortingPagination($container);
        });
        $this->container['taskPagination'] = $this->container->factory(function ($container) {
            return new Pagination\TagiDashboardTaskSortingTaskPagination($container);
        });
    }

    public function getPluginName()
    {
        return 'TagiDashboardTaskSorting';
    }

    public function getPluginDescription()
    {
        return t('Tagi Dashboard Task Sorting changes the default sorting for tasks on the main dashboard to 1. due date ASC and 2. priority DESC: for both, the overview and the tasks site.');
    }

    public function getPluginAuthor()
    {
        return 'Tagirijus';
    }

    public function getPluginVersion()
    {
        return '1.1.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/tagirijus/kanboard-TagiDashboardTaskSorting';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.26';
    }
}