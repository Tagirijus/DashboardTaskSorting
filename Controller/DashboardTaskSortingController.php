<?php

namespace Kanboard\Plugin\DashboardTaskSorting\Controller;




class DashboardTaskSortingController extends \Kanboard\Controller\PluginController
{
    /**
     * Settins page for the DashboardTaskSorting plugin.
     *
     * @return HTML response
     */
    public function show()
    {
        $this->response->html($this->helper->layout->config('DashboardTaskSorting:config/dashboardtasksorting_config', [
            'title' => t('DashboardTaskSorting') . ' &gt; ' . t('Settings'),
            'group_1_columns' => $this->configModel->get('dashboardtasksorting_group_1_columns', ''),
            'group_2_columns' => $this->configModel->get('dashboardtasksorting_group_2_columns', ''),
            'group_3_columns' => $this->configModel->get('dashboardtasksorting_group_3_columns', ''),
            'group_4_columns' => $this->configModel->get('dashboardtasksorting_group_4_columns', ''),
            'group_1_caption' => $this->configModel->get('dashboardtasksorting_group_1_caption', ''),
            'group_2_caption' => $this->configModel->get('dashboardtasksorting_group_2_caption', ''),
            'group_3_caption' => $this->configModel->get('dashboardtasksorting_group_3_caption', ''),
            'group_4_caption' => $this->configModel->get('dashboardtasksorting_group_4_caption', '')
        ]));
    }

    /**
     * Save the setting for DashboardTaskSorting.
     */
    public function saveConfig()
    {
        $form = $this->request->getValues();

        $values = [
            'dashboardtasksorting_group_1_columns' => $form['group_1_columns'],
            'dashboardtasksorting_group_2_columns' => $form['group_2_columns'],
            'dashboardtasksorting_group_3_columns' => $form['group_3_columns'],
            'dashboardtasksorting_group_4_columns' => $form['group_4_columns'],
            'dashboardtasksorting_group_1_caption' => $form['group_1_caption'],
            'dashboardtasksorting_group_2_caption' => $form['group_2_caption'],
            'dashboardtasksorting_group_3_caption' => $form['group_3_caption'],
            'dashboardtasksorting_group_4_caption' => $form['group_4_caption']
        ];

        $this->languageModel->loadCurrentLanguage();

        if ($this->configModel->save($values)) {
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

        return $this->response->redirect($this->helper->url->to('DashboardTaskSortingController', 'show', ['plugin' => 'DashboardTaskSorting']), true);
    }
}