<?php

namespace Kanboard\Plugin\Outlook\Notification;

use Kanboard\Core\Base;
use Kanboard\Core\Notification\NotificationInterface;
use Kanboard\Model\TaskModel;

/**
 * Outlook Notification
 *
 * @package  notification
 * @author   Siddharth Kaul
 */
class Outlook extends Base implements NotificationInterface
{
    /**
     * Send notification to a user
     *
     * @access public
     * @param  array     $user
     * @param  string    $eventName
     * @param  array     $eventData
     */
    public function notifyUser(array $user, $eventName, array $eventData)
    {
        $webhook = $this->userMetadataModel->get($user['id'], 'outlook_webhook_url', $this->configModel->get('outlook_webhook_url'));
        $channel = $this->userMetadataModel->get($user['id'], 'outlook_webhook_channel', $this->configModel->get('outlook_webhook_channel'));
        if (! empty($webhook)) {
            if ($eventName === TaskModel::EVENT_OVERDUE) {
                foreach ($eventData['tasks'] as $task) {
                    $project = $this->projectModel->getById($task['project_id']);
                    $eventData['task'] = $task;
                    $this->sendMessage($webhook, $channel, $project, $eventName, $eventData);
                }
            } else {
                $project = $this->projectModel->getById($eventData['task']['project_id']);
                $this->sendMessage($webhook, $channel, $project, $eventName, $eventData);
            }
        }
    }

    /**
     * Send notification to a project
     *
     * @access public
     * @param  array     $project
     * @param  string    $eventName
     * @param  array     $eventData
     */
    public function notifyProject(array $project, $eventName, array $eventData)
    {
        $webhook = $this->projectMetadataModel->get($project['id'], 'outlook_webhook_url', $this->configModel->get('outlook_webhook_url'));
        $channel = $this->projectMetadataModel->get($project['id'], 'outlook_webhook_channel');
        if (! empty($webhook)) {
            $this->sendMessage($webhook, $channel, $project, $eventName, $eventData);
        }
    }

    /**
     * Get message to send
     *
     * @access public
     * @param  array     $project
     * @param  string    $eventName
     * @param  array     $eventData
     * @return array
     */
    public function getMessage(array $project, $eventName, array $eventData)
    {
        if ($this->userSession->isLogged()) {
            $author = $this->helper->user->getFullname();
            $title = $this->notificationModel->getTitleWithAuthor($author, $eventName, $eventData);
        } else {
            $title = $this->notificationModel->getTitleWithoutAuthor($eventName, $eventData);
        }

        $message = '**'.$project['name'].'** ';
        $message .= $title;
        $message .= ' __'.$eventData['task']['title'].'__';

        if ($this->configModel->get('application_url') !== '') {
            $message .= ' ['.t('view the task on Kanboard').']';
            $message .= '(';
            $message .= $this->helper->url->to('TaskViewController', 'show', array('task_id' => $eventData['task']['id'], 'project_id' => $project['id']), '', true);
            $message .= ') ';
        }
        
        $myobj_original = array(
            'version' => '1.0',
            'text' => $message, //Body
            'hideOriginalBody' => false,
            'enableBodyToggling' => true,
            'summary' => $title, //Subject
            'title' => $title, //Title Card
            'themeColor' => '0078D7'
            );
        $myobj_new = array(
            'version' => '1.0',
            'type' => 'AdaptiveCard',
            'text' => $message, //Body
            'hideOriginalBody' => false,
            'enableBodyToggling' => true,
            'summary' => $title, //Subject
            'title' => $title, //Title Card
            'themeColor' => '0078D7',
            'body' => array(
                    array(
                        'type' => 'TextBlock',
                        'text' => 'Test message to check json creating'
                    ),
                    array(
                        'type' => 'Input.Text',
                        'id' => 'sampleInput',
                        'placeholder' => 'Some Sample Text as Place Holder'
                    )
            ), //end of body
            'actions' => array(
                    array(
                    'type' => 'Action.Http',
                    'title' => 'Say hello',
                    'method' => 'GET',
                    'url' => 'https://google.com'
                    )
            ) //end of actions
        ); //end of myobj_new
        $myobj_messagecard = array(
            'version' => '1.0',
            'type' => 'MessageCard',
            'text' => $message, //Body
            'hideOriginalBody' => false,
            'enableBodyToggling' => true,
            'summary' => $title, //Subject
            'title' => $title, //Title Card
            'themeColor' => '0078D7',
            'sections' => array(
                    array(
                        'facts' => array(
                            array(
                                'name' => 'Some Name',
                                'value' => 'Some Value'
                            ),
                            array(
                                'name' => 'Other Text',
                                'value' => 'Other Text'
                            ),
                            ),//end of facts inner
                        'text' => 'Some text abvoe the facts'
                        )//end of facts outer
            ) //end of sections
            
        ); //end of myobj_messagecard
        return $myobj_messagecard;
    }

    /**
     * Send message to Outlook
     *
     * @access protected
     * @param  string    $webhook
     * @param  string    $channel
     * @param  array     $project
     * @param  string    $eventName
     * @param  array     $eventData
     */
    protected function sendMessage($webhook, $channel, array $project, $eventName, array $eventData)
    {
        $payload = $this->getMessage($project, $eventName, $eventData);

        if (! empty($channel)) {
            $payload['channel'] = $channel;
        }


        $this->httpClient->postJsonAsync($webhook, $payload);
    }
}
