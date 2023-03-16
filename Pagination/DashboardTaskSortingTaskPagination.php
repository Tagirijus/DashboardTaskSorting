<?php

// namespace Kanboard\Pagination;
namespace Kanboard\Plugin\DashboardTaskSorting\Pagination;

use Kanboard\Core\Base;
use Kanboard\Core\Paginator;
use Kanboard\Model\TaskModel;

/**
 * Class TaskPagination
 *
 * @package Kanboard\Pagination
 * @author  Frederic Guillot
 */
class DashboardTaskSortingTaskPagination extends Base
{
    /**
     * Get dashboard pagination
     *
     * @access public
     * @param  integer $userId
     * @param  string  $method
     * @param  integer $max
     * @return Paginator
     */
    public function getDashboardPaginator($userId, $method, $max)
    {
        $query = $this->taskFinderModel->getUserQuery($userId);
        $this->hook->reference('pagination:dashboard:task:query', $query);

        // if a GET option for "order" is given, use the native logic,
        // otherwise use my new logic, which also puts the task to the
        // bottom of the list, if their due-date is 0
        //
        // so in that case here: no GET is given or "tasks.date_due"
        if (
            $this->container['request']->getStringParam('order', 'NULL') == 'NULL'
            || $this->container['request']->getStringParam('order', 'NULL') == 'tasks.date_due'
        ) {
            // also only put the 0 due-dates to the bottom, if the direction is ASC
            $ascOrDesc = $this->container['request']->getStringParam('direction', 'ASC');
            if ($ascOrDesc == 'ASC') {
                // to be honest: ChatGPT magic here, which I somehow changed, till it worked ... :D
                // I only understand a part of it: I look for due-dates, which are 0 and give them
                // 1, otherwise 0 (this part isn't logical to me, but it works ... magically); then
                // I add another sorting by the due-date and sort everyhing ASCending
                $orderTmp = (
                        'CASE WHEN ' . TaskModel::TABLE . '.date_due = 0 THEN 1 ELSE 0 END, ' .
                        TaskModel::TABLE . '.date_due'
                );
            } else {
                // here I just invert the "1 ELSE 0" to "0 ELSE 1" - again magic,
                // or I just cannot follow the logic right now - woopsie
                $orderTmp = (
                        'CASE WHEN ' . TaskModel::TABLE . '.date_due = 0 THEN 0 ELSE 1 END, ' .
                        TaskModel::TABLE . '.date_due'
                );
            }
            $query->orderBy($orderTmp, $ascOrDesc);
            $query->orderBy(TaskModel::TABLE . '.priority', 'DESC');
            $query->orderBy(TaskModel::TABLE . '.position', 'ASC');
        }

        return $this->paginator
            ->setUrl('DashboardController', $method, array('pagination' => 'tasks', 'user_id' => $userId))
            ->setMax($max)
            ->setOrder(TaskModel::TABLE.'.date_due')
            ->setQuery($query)
            ->setFormatter($this->taskListFormatter)
            ->calculateOnlyIf($this->request->getStringParam('pagination') === 'tasks');
    }
}
