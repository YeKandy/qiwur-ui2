<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Page Entity'), ['action' => 'edit', $pageEntity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Page Entity'), ['action' => 'delete', $pageEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pageEntity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Page Entities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page Entity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Crawls'), ['controller' => 'Crawls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Crawl'), ['controller' => 'Crawls', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Page Entity Fields'), ['controller' => 'PageEntityFields', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page Entity Field'), ['controller' => 'PageEntityFields', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Scent Jobs'), ['controller' => 'ScentJobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scent Job'), ['controller' => 'ScentJobs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pageEntities view ten columns content">
    <h3><?= h($pageEntity->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($pageEntity->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Domain') ?></th>
            <td><?= h($pageEntity->domain) ?></td>
        </tr>
        <tr>
            <th><?= __('Block Path') ?></th>
            <td><?= h($pageEntity->block_path) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($pageEntity->status) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $pageEntity->has('user') ? $this->Html->link($pageEntity->user->name, ['controller' => 'Users', 'action' => 'view', $pageEntity->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Crawl') ?></th>
            <td><?= $pageEntity->has('crawl') ? $this->Html->link($pageEntity->crawl->name, ['controller' => 'Crawls', 'action' => 'view', $pageEntity->crawl->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('CrawlId') ?></th>
            <td><?= h($pageEntity->crawlId) ?></td>
        </tr>
        <tr>
            <th><?= __('ConfigId') ?></th>
            <td><?= h($pageEntity->configId) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pageEntity->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pageEntity->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pageEntity->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Finished') ?></th>
            <td><?= h($pageEntity->finished) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url Filter') ?></h4>
        <?= $this->Text->autoParagraph(h($pageEntity->url_filter)); ?>
    </div>
    <div class="row">
        <h4><?= __('Text Filter') ?></h4>
        <?= $this->Text->autoParagraph(h($pageEntity->text_filter)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($pageEntity->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Page Entity Fields') ?></h4>
        <?php if (!empty($pageEntity->page_entity_fields)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Css Path') ?></th>
                <th><?= __('Text Extract Regex') ?></th>
                <th><?= __('Text Validate Regex') ?></th>
                <th><?= __('Extractor Class') ?></th>
                <th><?= __('Sql Data Type') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Page Entity Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pageEntity->page_entity_fields as $pageEntityFields): ?>
            <tr>
                <td><?= h($pageEntityFields->id) ?></td>
                <td><?= h($pageEntityFields->name) ?></td>
                <td><?= h($pageEntityFields->css_path) ?></td>
                <td><?= h($pageEntityFields->text_extract_regex) ?></td>
                <td><?= h($pageEntityFields->text_validate_regex) ?></td>
                <td><?= h($pageEntityFields->extractor_class) ?></td>
                <td><?= h($pageEntityFields->sql_data_type) ?></td>
                <td><?= h($pageEntityFields->description) ?></td>
                <td><?= h($pageEntityFields->page_entity_id) ?></td>
                <td><?= h($pageEntityFields->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PageEntityFields', 'action' => 'view', $pageEntityFields->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PageEntityFields', 'action' => 'edit', $pageEntityFields->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PageEntityFields', 'action' => 'delete', $pageEntityFields->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pageEntityFields->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scent Jobs') ?></h4>
        <?php if (!empty($pageEntity->scent_jobs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('CrawlId') ?></th>
                <th><?= __('ConfigId') ?></th>
                <th><?= __('JobId') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Args') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Msg') ?></th>
                <th><?= __('Raw Msg') ?></th>
                <th><?= __('Results') ?></th>
                <th><?= __('Page Entity Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pageEntity->scent_jobs as $scentJobs): ?>
            <tr>
                <td><?= h($scentJobs->id) ?></td>
                <td><?= h($scentJobs->crawlId) ?></td>
                <td><?= h($scentJobs->configId) ?></td>
                <td><?= h($scentJobs->jobId) ?></td>
                <td><?= h($scentJobs->type) ?></td>
                <td><?= h($scentJobs->args) ?></td>
                <td><?= h($scentJobs->state) ?></td>
                <td><?= h($scentJobs->msg) ?></td>
                <td><?= h($scentJobs->raw_msg) ?></td>
                <td><?= h($scentJobs->results) ?></td>
                <td><?= h($scentJobs->page_entity_id) ?></td>
                <td><?= h($scentJobs->user_id) ?></td>
                <td><?= h($scentJobs->created) ?></td>
                <td><?= h($scentJobs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ScentJobs', 'action' => 'view', $scentJobs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ScentJobs', 'action' => 'edit', $scentJobs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ScentJobs', 'action' => 'delete', $scentJobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scentJobs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
