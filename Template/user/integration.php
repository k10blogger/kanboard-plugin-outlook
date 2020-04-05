<h3><img src="<?= $this->url->dir() ?>plugins/Outlook/outlook-icon.png"/>Outlook</h3>
<div class="panel">
    <?= $this->form->label(t('Webhook URL'), 'outlook_webhook_url') ?>
    <?= $this->form->text('outlook_webhook_url', $values) ?>

    <?= $this->form->label(t('Channel/Group/User (Optional)'), 'outlook_webhook_channel') ?>
    <?= $this->form->text('outlook_webhook_channel', $values, array(), array('placeholder="@username"')) ?>
    <p class="form-help"><a href="https://github.com/k10blogger/kanboard-plugin-outlook#configuration" target="_blank"><?= t('Help on Outlook integration') ?></a></p>

    <div class="form-actions">
        <input type="submit" value="<?= t('Save') ?>" class="btn btn-blue"/>
    </div>
</div>
