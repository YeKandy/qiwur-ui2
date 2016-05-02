<div class="pageEntityFields index content">
    <h3><?= __('Page Entity Fields') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('css_path') ?></th>
                <th><?= $this->Paginator->sort('text_extract_regex') ?></th>
                <th><?= $this->Paginator->sort('text_validate_regex') ?></th>
                <th><?= $this->Paginator->sort('extractor_class') ?></th>
                <th><?= $this->Paginator->sort('sql_data_type') ?></th>
                <th><?= $this->Paginator->sort('page_entity_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pageEntityFields as $pageEntityField): ?>
            <tr>
                <td><?= $this->Number->format($pageEntityField->id) ?></td>
                <td><?= h($pageEntityField->name) ?></td>
                <td><?= h($pageEntityField->css_path) ?></td>
                <td><?= h($pageEntityField->text_extract_regex) ?></td>
                <td><?= h($pageEntityField->text_validate_regex) ?></td>
                <td><?= h($pageEntityField->extractor_class) ?></td>
                <td><?= h($pageEntityField->sql_data_type) ?></td>
                <td><?= $pageEntityField->has('page_entity') ? $this->Html->link($pageEntityField->page_entity->name, ['controller' => 'PageEntities', 'action' => 'view', $pageEntityField->page_entity->id]) : '' ?></td>
                <td><?= $pageEntityField->has('user') ? $this->Html->link($pageEntityField->user->name, ['controller' => 'Users', 'action' => 'view', $pageEntityField->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pageEntityField->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pageEntityField->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pageEntityField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pageEntityField->id)]) ?>
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
        <li><?= $this->Html->link(__('New Page Entity Field'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Page Entities'), ['controller' => 'PageEntities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page Entity'), ['controller' => 'PageEntities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
