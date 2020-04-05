<h3><img src="<?= $this->url->dir() ?>plugins/Outlook/outlook-icon.png"/>Outlook</h3>
<div class="panel">
    <?= $this->form->label(t('Webhook URL'), 'outlook_webhook_url') ?>
    <?= $this->form->text('outlook_webhook_url', $values) ?>

    <?= $this->form->label(t('Channel/Group/User (Optional)'), 'outlook_webhook_channel') ?>
    <?= $this->form->text('outlook_webhook_channel', $values, array(), array('placeholder="#channel"')) ?>
    <?= $this->form->label(t('Notifications'), 'notification_label') ?>
	<?php
		/* Create Controller PHP on a later Date */
		$outlookoptions = array(
			'comment.create'		=> t('Comment Create Notification'),
			'comment.update'		=> t('Comment Update Notification'),
			'comment.delete'		=> t('Comment Delete Notification'),
			'file.create'			=> t('File Create Notification'),
			'task.move.project'		=> t('Task Move to Project Notification'),
			'task.move.column'		=> t('Task Move to Column Notification'),
			'task.move.position'	=> t('Task Move to Position Notification'),
			'task.move.swimlane'	=> t('Task Move to Swimlane Notification'),
			'task.update'			=> t('Task Update Notification')
			);
			/*
			'task.create'			=> t(),
			'task.close'			=> t(),
			'task.open'				=> t(),
			'task.assignee_change'	=> t(),
			'subtask.update'		=> t(),
			'subtask.create'		=> t(),
			'subtask.delete'		=> t(),
			'task_internal_link.create_update'	=> t(),
			'task_internal_link.delete'			=> t()
			);*/

	?>
	<?= $this->form->checkboxes('outlook',$outlookoptions,$values); ?>

    <?= $this->form->checkbox('task.update',t('Task Update Notification'),1,$values['task.update']==1)?>
    <?= $this->form->checkbox('task.create',t('Task Create Notification'),1,$values['task.create']==1)?>
    <?= $this->form->checkbox('task.close',t('Task Close Notification'),1,$values['task.close']==1)?>
    <?= $this->form->checkbox('task.open',t('Task Open Notification'),1,$values['task.open']==1)?>
    <?= $this->form->checkbox('task.assignee_change',t('Task Assignee Change Notification'),1,$values['task.assignee_change']==1)?>
    <?= $this->form->checkbox('subtask.update',t('SubTask Update Notification'),1,$values['subtask.update']==1)?>
    <?= $this->form->checkbox('subtask.create',t('SubTask Create Notification'),1,$values['subtask.create']==1)?>
    <?= $this->form->checkbox('subtask.delete',t('SubTask Delete Notification'),1,$values['subtask.delete']==1)?>
    <?= $this->form->checkbox('task_internal_link.create_update',t('Task Link Create Notification'),1,$values['task_internal_link.create_update']==1)?>
    <?= $this->form->checkbox('task_internal_link.delete','Task Link Delete Notification',1,$values['task_internal_link.delete']==1)?>


    <p class="form-help"><a href="https://github.com/k10blogger/kanboard-plugin-outlook#configuration" target="_blank"><?= t('Help on Outlook integration') ?></a></p>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
    </div>
</div>
