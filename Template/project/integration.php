<h3>Outlook</h3>
<div class="panel">
    <?= $this->form->label(t('Webhook URL'), 'outlook_webhook_url') ?>
    <?= $this->form->text('outlook_webhook_url', $values) ?>

    <?= $this->form->label(t('Channel/Group/User (Optional)'), 'outlook_webhook_channel') ?>
    <?= $this->form->text('outlook_webhook_channel', $values, array(), array('placeholder="#channel"')) ?>
	<?= $this->form->label(t('Notifications'), 'notification_label') ?>
    <?= $this->form->checkbox('select_event','Comment Create Notification','comment.create')?>
    <?= $this->form->checkbox('select_event','Comment Update Notification','comment.update')?>
    <?= $this->form->checkbox('select_event','Comment Delete Notification','comment.delete')?>
    <?= $this->form->checkbox('select_event','File Create Notification','file.create')?>
    <?= $this->form->checkbox('select_event','Task Move to Project Notification','task.move.project')?>
    <?= $this->form->checkbox('select_event','Task Move to Column Notification','task.move.column')?>
    <?= $this->form->checkbox('select_event','Task Move to Position Notification','task.move.position')?>
    <?= $this->form->checkbox('select_event','Task Move to Swimlane Notification','task.move.swimlane')?>
    <?= $this->form->checkbox('select_event','Task Update Notification','task.update')?>
    <?= $this->form->checkbox('select_event','Task Create Notification','task.create')?>
    <?= $this->form->checkbox('select_event','Task Close Notification','task.close')?>
    <?= $this->form->checkbox('select_event','Task Open Notification','task.open')?>
    <?= $this->form->checkbox('select_event','Task Assignee Change Notification','task.assignee_change')?>
    <?= $this->form->checkbox('select_event','SubTask Update Notification','subtask.update')?>
    <?= $this->form->checkbox('select_event','SubTask Create Notification','subtask.create')?>
    <?= $this->form->checkbox('select_event','SubTask Delete Notification','subtask.delete')?>
    <?= $this->form->checkbox('select_event','Task Link Create Notification','task_internal_link.create_update')?>
    <?= $this->form->checkbox('select_event','Task Link Delete Notification','task_internal_link.delete')?>


    <p class="form-help"><a href="https://github.com/k10blogger/kanboard-plugin-outlook#configuration" target="_blank"><?= t('Help on Outlook integration') ?></a></p>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
    </div>
</div>
