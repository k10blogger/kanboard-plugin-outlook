<h3><img src="<?= $this->url->dir() ?>plugins/Outlook/outlook-icon.png"/>Outlook</h3>
<div class="panel">
    <?= $this->form->label(t('Webhook URL'), 'outlook_webhook_url') ?>
    <?= $this->form->text('outlook_webhook_url', $values) ?>

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
			'task.update'			=> t('Task Update Notification'),
			'task.create'			=> t('Task Create Notification'),
			'task.close'			=> t('Task Close Notification'),
			'task.open'				=> t('Task Open Notification'),
			'task.assignee_change'	=> t('Task Assignee Change Notification'),
			'subtask.update'		=> t('SubTask Update Notification'),
			'subtask.create'		=> t('SubTask Create Notification'),
			'subtask.delete'		=> t('SubTask Delete Notification'),
			'task_internal_link.create_update'	=> t('Task Link Create Notification'),
			'task_internal_link.delete'			=> t('Task Link Delete Notification')
			);
	?>
	<?= $this->form->label(t('Notifications - Work in Progress Doesnt Work Now'), 'notification_label') ?>
	<?= $this->form->checkboxes('outlook',$outlookoptions); ?>
    <p class="form-help"><a href="https://github.com/k10blogger/kanboard-plugin-outlook#configuration" target="_blank"><?= t('Help on Outlook integration') ?></a></p>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
    </div>
</div>
