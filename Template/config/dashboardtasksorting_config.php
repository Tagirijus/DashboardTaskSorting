<div class="page-header">
    <h2><?= t('DashboardTaskSorting configuration') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('DashboardTaskSortingController', 'saveConfig', ['plugin' => 'DashboardTaskSorting']) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <br>


    <!-- COLUMNS GROUP -->

    <p>
        <h3><?= t('Group columns') ?></h3>
    </p>

    <p>
        <?= t('Enter column names comma seperated, which should be grouped together.') ?>
    </p>
    <div class="task-form-container">

        <div class="task-form-main-column">
            <?= $this->form->label(t('Group') . ' 1 - ' . t('Columns'), 'group_1_columns') ?>
            <?= $this->form->text('group_1_columns', ['group_1_columns' => $group_1_columns], [], [
                'autofocus',
                'tabindex="1"'
            ]) ?>
        </div>

        <div class="task-form-main-column">
            <?= $this->form->label(t('Group') . ' 2 - ' . t('Columns'), 'group_2_columns') ?>
            <?= $this->form->text('group_2_columns', ['group_2_columns' => $group_2_columns], [], [
                'autofocus',
                'tabindex="2"'
            ]) ?>
        </div>

        <div class="task-form-main-column">
            <?= $this->form->label(t('Group') . ' 3 - ' . t('Columns'), 'group_3_columns') ?>
            <?= $this->form->text('group_3_columns', ['group_3_columns' => $group_3_columns], [], [
                'autofocus',
                'tabindex="3"'
            ]) ?>
        </div>

        <div class="task-form-main-column">
            <?= $this->form->label(t('Group') . ' 4 - ' . t('Columns'), 'group_4_columns') ?>
            <?= $this->form->text('group_4_columns', ['group_4_columns' => $group_4_columns], [], [
                'autofocus',
                'tabindex="4"'
            ]) ?>
        </div>

    </div>

    <br>
    <br>


    <!-- GROUP CAPTIONS -->

    <p>
        <h3><?= t('Group captions') ?></h3>
    </p>

    <p>
        <?= t('The captions / titles for the group-columns on the dashboard.') ?>
    </p>
    <div class="task-form-container">

        <div class="task-form-main-column">
            <?= $this->form->label(t('Group') . ' 1 ' . t('caption'), 'group_1_caption') ?>
            <?= $this->form->text('group_1_caption', ['group_1_caption' => $group_1_caption], [], [
                'autofocus',
                'tabindex="1"'
            ]) ?>
        </div>

        <div class="task-form-main-column">
            <?= $this->form->label(t('Group') . ' 2 ' . t('caption'), 'group_2_caption') ?>
            <?= $this->form->text('group_2_caption', ['group_2_caption' => $group_2_caption], [], [
                'autofocus',
                'tabindex="2"'
            ]) ?>
        </div>

        <div class="task-form-main-column">
            <?= $this->form->label(t('Group') . ' 3 ' . t('caption'), 'group_3_caption') ?>
            <?= $this->form->text('group_3_caption', ['group_3_caption' => $group_3_caption], [], [
                'autofocus',
                'tabindex="3"'
            ]) ?>
        </div>

        <div class="task-form-main-column">
            <?= $this->form->label(t('Group') . ' 4 ' . t('caption'), 'group_4_caption') ?>
            <?= $this->form->text('group_4_caption', ['group_4_caption' => $group_4_caption], [], [
                'autofocus',
                'tabindex="4"'
            ]) ?>
        </div>

    </div>



    <div class="task-form-bottom">
        <?= $this->modal->submitButtons() ?>
    </div>

</form>
