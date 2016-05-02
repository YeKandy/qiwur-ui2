<div class="pageEntities index content">
    <h3><?= __('Page Entities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('domain') ?></th>
                <th><?= $this->Paginator->sort('block_path') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('finished') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('crawl_id') ?></th>
                <th><?= $this->Paginator->sort('crawlId') ?></th>
                <th><?= $this->Paginator->sort('configId') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pageEntities as $pageEntity): ?>
            <tr>
                <td><?= $this->Number->format($pageEntity->id) ?></td>
                <td><?= h($pageEntity->name) ?></td>
                <td><?= h($pageEntity->domain) ?></td>
                <td><?= h($pageEntity->block_path) ?></td>
                <td><?= h($pageEntity->status) ?></td>
                <td><?= h($pageEntity->created) ?></td>
                <td><?= h($pageEntity->modified) ?></td>
                <td><?= h($pageEntity->finished) ?></td>
                <td><?= $pageEntity->has('user') ? $this->Html->link($pageEntity->user->name, ['controller' => 'Users', 'action' => 'view', $pageEntity->user->id]) : '' ?></td>
                <td><?= $pageEntity->has('crawl') ? $this->Html->link($pageEntity->crawl->name, ['controller' => 'Crawls', 'action' => 'view', $pageEntity->crawl->id]) : '' ?></td>
                <td><?= h($pageEntity->crawlId) ?></td>
                <td><?= h($pageEntity->configId) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pageEntity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pageEntity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pageEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pageEntity->id)]) ?>
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
        <li><?= $this->Html->link(__('New Page Entity'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Crawls'), ['controller' => 'Crawls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crawl'), ['controller' => 'Crawls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Page Entity Fields'), ['controller' => 'PageEntityFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page Entity Field'), ['controller' => 'PageEntityFields', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scent Jobs'), ['controller' => 'ScentJobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scent Job'), ['controller' => 'ScentJobs', 'action' => 'add']) ?></li>
    </ul>
</div>
