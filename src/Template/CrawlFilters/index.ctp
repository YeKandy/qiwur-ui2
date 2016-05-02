<div class="crawlFilters index content">
    <h3><?= __('Crawl Filters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('page_type') ?></th>
                <th><?= $this->Paginator->sort('crawl_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($crawlFilters as $crawlFilter): ?>
            <tr>
                <td><?= $this->Number->format($crawlFilter->id) ?></td>
                <td><?= h($crawlFilter->page_type) ?></td>
                <td><?= $crawlFilter->has('crawl') ? $this->Html->link($crawlFilter->crawl->name, ['controller' => 'Crawls', 'action' => 'view', $crawlFilter->crawl->id]) : '' ?></td>
                <td><?= $crawlFilter->has('user') ? $this->Html->link($crawlFilter->user->name, ['controller' => 'Users', 'action' => 'view', $crawlFilter->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $crawlFilter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $crawlFilter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $crawlFilter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crawlFilter->id)]) ?>
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
        <li><?= $this->Html->link(__('New Crawl Filter'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Crawls'), ['controller' => 'Crawls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crawl'), ['controller' => 'Crawls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
