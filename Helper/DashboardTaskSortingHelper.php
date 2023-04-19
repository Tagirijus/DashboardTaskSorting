<?php

namespace Kanboard\Plugin\DashboardTaskSorting\Helper;

use Kanboard\Core\Base;


class DashboardTaskSortingHelper extends Base
{
    /**
     * Get columns to group for each group.
     *
     * @return array
     */
    public function getGroupColumns()
    {
        $group_columns = [
            'group_1' => explode(',', $this->configModel->get('dashboardtasksorting_group_1_columns', '')),
            'group_2' => explode(',', $this->configModel->get('dashboardtasksorting_group_2_columns', '')),
            'group_3' => explode(',', $this->configModel->get('dashboardtasksorting_group_3_columns', '')),
            'group_4' => explode(',', $this->configModel->get('dashboardtasksorting_group_4_columns', ''))
        ];
        return $group_columns;
    }

    /**
     * Get group captions.
     *
     * @return array
     */
    public function getGroupCaptions()
    {
        $group_columns = [
            'group_1' => $this->configModel->get('dashboardtasksorting_group_1_caption'),
            'group_2' => $this->configModel->get('dashboardtasksorting_group_2_caption'),
            'group_3' => $this->configModel->get('dashboardtasksorting_group_3_caption'),
            'group_4' => $this->configModel->get('dashboardtasksorting_group_4_caption')
        ];
        return $group_columns;
    }
}
