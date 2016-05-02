<div class="settings index content">
    <h3><?= __('Settings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('skey') ?></th>
                <th><?= $this->Paginator->sort('svalue') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($settings as $setting): ?>
            <tr>
                <td><?= $this->Number->format($setting->id) ?></td>
                <td><?= h($setting->skey) ?></td>
                <td><?= h($setting->svalue) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $setting->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $setting->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $setting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

<div class="actions">
    <ul>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Setting'), ['action' => 'add']) ?></li>
    </ul>
</div>
