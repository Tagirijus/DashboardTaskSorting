<?php

$groupcaptions = $this->dashboardTaskSortingHelper->getGroupCaptions();
$groupcolumns  = $this->dashboardTaskSortingHelper->getGroupColumns();

$group1 = [];
$group2 = [];
$group3 = [];
$group4 = [];
$group_fallback = [];
foreach ($paginator->getCollection() as $task) {
    $colname = $task['column_name'];
    if (in_array($colname, $groupcolumns['group_1'])) {
        $group1[] = $task;
    } elseif (in_array($colname, $groupcolumns['group_2'])) {
        $group2[] = $task;
    } elseif (in_array($colname, $groupcolumns['group_3'])) {
        $group3[] = $task;
    } elseif (in_array($colname, $groupcolumns['group_4'])) {
        $group4[] = $task;
    } else {
        $group_fallback[] = $task;
    }
}


function renderTask($task, $app)
{
    $out = '<div class="table-list-row color-' . $task['color_id'] . '">';
    $out .= $app->render('task_list/task_title', array(
        'task' => $task,
        'redirect' => 'dashboard-tasks',
    ));
    $out .= $app->render('task_list/task_details', array(
        'task' => $task,
    ));
    $out .= $app->render('task_list/task_avatars', array(
        'task' => $task,
    ));
    $out .= $app->render('task_list/task_icons', array(
        'task' => $task,
    ));
    $out .=$app->render('task_list/task_subtasks', array(
        'task' => $task,
    ));
    $out .= $app->hook->render('template:dashboard:task:footer', array('task' => $task));
    $out .= "</div>";

    return $out;
}

?>


<div class="page-header">
    <h2><?= $this->url->link(t('My tasks'), 'DashboardController', 'tasks', array('user_id' => $user['id'])) ?> (<?= $paginator->getTotal() ?>)</h2>
</div>
<?php if ($paginator->isEmpty()): ?>
    <p class="alert"><?= t('There is nothing assigned to you.') ?></p>
<?php else: ?>
    <div class="table-list">
        <?= $this->render('task_list/header', array(
            'paginator' => $paginator,
        )) ?>


        <!-- Group 1 -->

        <?php if (!empty($group1)): ?>
            <p class="dts-group-caption"><?= $groupcaptions['group_1']; ?></p>

            <?php foreach ($group1 as $task): ?>
                <?= renderTask($task, $this); ?>
            <?php endforeach ?>
            <br><br>
        <?php endif ?>


        <!-- Group 2 -->

        <?php if (!empty($group2)): ?>
            <p class="dts-group-caption"><?= $groupcaptions['group_2']; ?></p>

            <?php foreach ($group2 as $task): ?>
                <?= renderTask($task, $this); ?>
            <?php endforeach ?>
            <br><br>
        <?php endif ?>


        <!-- Group 3 -->

        <?php if (!empty($group3)): ?>
            <p class="dts-group-caption"><?= $groupcaptions['group_3']; ?></p>

            <?php foreach ($group3 as $task): ?>
                <?= renderTask($task, $this); ?>
            <?php endforeach ?>
            <br><br>
        <?php endif ?>


        <!-- Group 4 -->

        <?php if (!empty($group4)): ?>
            <p class="dts-group-caption"><?= $groupcaptions['group_4']; ?></p>

            <?php foreach ($group4 as $task): ?>
                <?= renderTask($task, $this); ?>
            <?php endforeach ?>
            <br><br>
        <?php endif ?>


        <!-- ungrouped fallback tasks -->

        <?php foreach ($group_fallback as $task): ?>
            <?= renderTask($task, $this); ?>
        <?php endforeach ?>


    </div>

    <?= $paginator ?>
<?php endif ?>
