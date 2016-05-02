<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Aro'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Acos'), ['controller' => 'Acos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Aco'), ['controller' => 'Acos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aros index large-10 medium-8 columns content">
    <h3><?= __('Aros') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('model') ?></th>
                <th><?= $this->Paginator->sort('foreign_key') ?></th>
                <th><?= $this->Paginator->sort('alias') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aros as $aro): ?>
            <tr>
                <td><?= $this->Number->format($aro->id) ?></td>
                <td><?= $aro->has('parent_aro') ? $this->Html->link($aro->parent_aro->id, ['controller' => 'Aros', 'action' => 'view', $aro->parent_aro->id]) : '' ?></td>
                <td><?= h($aro->model) ?></td>
                <td><?= $this->Number->format($aro->foreign_key) ?></td>
                <td><?= h($aro->alias) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aro->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aro->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aro->id)]) ?>
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
