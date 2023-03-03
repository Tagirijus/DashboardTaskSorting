<?php

namespace Kanboard\Plugin\TagiDashboardTaskSorting;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TagiDashboardTaskSorting\Pagination;


class Plugin extends Base
{
    public function initialize()
    {
        $this->container['dashboardPagination'] = $this->container->factory(function ($container) {
            return new Pagination\TagiDashboardPaginationTaskSorting($container);
        });
        $this->container['taskPagination'] = $this->container->factory(function ($container) {
            return new Pagination\TagiDashboardTaskPaginationTaskSorting($container);
        });
    }

    public function getPluginName()
    {
        return 'TagiDashboardTaskSorting';
    }

    public function getPluginDescription()
    {
        return t('Tagi Dashboard Task Sorting changes the default sorting for tasks on the main dashboard to due date ASC. For the overview and the tasks site.');
    }

    public function getPluginAuthor()
    {
        return 'Tagirijus';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://www.tagirijus.de';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.26';
    }
}