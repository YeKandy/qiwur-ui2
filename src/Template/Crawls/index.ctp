<div class="crawls index content">
    <h3><?= __('Crawls') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('crawl_mode') ?></th>
                <th><?= $this->Paginator->sort('rounds') ?></th>
                <th><?= $this->Paginator->sort('finished_rounds') ?></th>
                <th><?= $this->Paginator->sort('limit') ?></th>
                <th><?= $this->Paginator->sort('fetched_pages') ?></th>
                <th><?= $this->Paginator->sort('max_url_length') ?></th>
                <th><?= $this->Paginator->sort('state') ?></th>
                <th><?= $this->Paginator->sort('crawlId') ?></th>
                <th><?= $this->Paginator->sort('configId') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($crawls as $crawl): ?>
            <tr>
                <td><?= $this->Number->format($crawl->id) ?></td>
                <td><?= h($crawl->name) ?></td>
                <td><?= h($crawl->crawl_mode) ?></td>
                <td><?= $this->Number->format($crawl->rounds) ?></td>
                <td><?= $this->Number->format($crawl->finished_rounds) ?></td>
                <td><?= $this->Number->format($crawl->limit) ?></td>
                <td><?= $this->Number->format($crawl->fetched_pages) ?></td>
                <td><?= $this->Number->format($crawl->max_url_length) ?></td>
                <td><?= h($crawl->state) ?></td>
                <td><?= h($crawl->crawlId) ?></td>
                <td><?= h($crawl->configId) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $crawl->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $crawl->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $crawl->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crawl->id)]) ?>
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
        <li><?= $this->Html->link(__('New Crawl'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Crawl Filters'), ['controller' => 'CrawlFilters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crawl Filter'), ['controller' => 'CrawlFilters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Human Actions'), ['controller' => 'HumanActions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Human Action'), ['controller' => 'HumanActions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nutch Configs'), ['controller' => 'NutchConfigs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nutch Config'), ['controller' => 'NutchConfigs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nutch Jobs'), ['controller' => 'NutchJobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nutch Job'), ['controller' => 'NutchJobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Nutch Messages'), ['controller' => 'NutchMessages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Nutch Message'), ['controller' => 'NutchMessages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Page Entities'), ['controller' => 'PageEntities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page Entity'), ['controller' => 'PageEntities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Seeds'), ['controller' => 'Seeds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Seed'), ['controller' => 'Seeds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spark Jobs'), ['controller' => 'SparkJobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Spark Job'), ['controller' => 'SparkJobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stop Urls'), ['controller' => 'StopUrls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stop Url'), ['controller' => 'StopUrls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Web Authorizations'), ['controller' => 'WebAuthorizations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Web Authorization'), ['controller' => 'WebAuthorizations', 'action' => 'add']) ?></li>
    </ul>
</div>
