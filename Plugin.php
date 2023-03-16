<?php

namespace Kanboard\Plugin\TagiKPDashboardTaskSorting;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TagiKPDashboardTaskSorting\Pagination;


class Plugin extends Base
{
    public function initialize()
    {
        $this->container['dashboardPagination'] = $this->container->factory(function ($container) {
            return new Pagination\TagiKPDashboardTaskSortingPagination($container);
        });
        $this->container['taskPagination'] = $this->container->factory(function ($container) {
            return new Pagination\TagiKPDashboardTaskSortingTaskPagination($container);
        });
    }

    public function getPluginName()
    {
        return 'TagiKPDashboardTaskSorting';
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
        return '1.3.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/tagirijus/TagiKPDashboardTaskSorting';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.26';
    }
}