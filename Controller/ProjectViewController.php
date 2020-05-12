<?php

namespace Kanboard\Plugin\Outlook\Controller;
use Kanboard\Controller\ProjectViewController
/**
 * Class ProjectViewController
 *
 * @package Kanboard\Controller
 * @author  Frederic Guillot
 */
class ProjectViewController extends ProjectViewController
{


    /**
     * Integrations page
     *
     * @access public
     */
    public function integrations()
    {
        $project = $this->getProject();

        $this->response->html($this->helper->layout->project('project_view/integrations', array(
            'project' => $project,
            'title' => t('Integrations'),
            'webhook_token' => $this->configModel->get('webhook_token'),
            'values' => $this->projectMetadataModel->getAll($project['id']),
            'errors' => array(),
        )));
    }

    /**
     * Update integrations
     *
     * @throws \Kanboard\Core\Controller\PageNotFoundException
     */
    public function updateIntegrations()
    {
        $project = $this->getProject();

        $this->projectMetadataModel->save($project['id'], $this->request->getValues());
        $this->flash->success(t('Project updated successfully. Test SK.'));
        $this->response->redirect($this->helper->url->to('ProjectViewController', 'integrations', array('project_id' => $project['id'])));
    }

}
