<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Crawl'), ['action' => 'edit', $crawl->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Crawl'), ['action' => 'delete', $crawl->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crawl->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Crawls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Crawl'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Crawl Filters'), ['controller' => 'CrawlFilters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Crawl Filter'), ['controller' => 'CrawlFilters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Human Actions'), ['controller' => 'HumanActions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Human Action'), ['controller' => 'HumanActions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nutch Configs'), ['controller' => 'NutchConfigs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nutch Config'), ['controller' => 'NutchConfigs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nutch Jobs'), ['controller' => 'NutchJobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nutch Job'), ['controller' => 'NutchJobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nutch Messages'), ['controller' => 'NutchMessages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nutch Message'), ['controller' => 'NutchMessages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Page Entities'), ['controller' => 'PageEntities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page Entity'), ['controller' => 'PageEntities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Seeds'), ['controller' => 'Seeds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Seed'), ['controller' => 'Seeds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Spark Jobs'), ['controller' => 'SparkJobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Spark Job'), ['controller' => 'SparkJobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stop Urls'), ['controller' => 'StopUrls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stop Url'), ['controller' => 'StopUrls', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Web Authorizations'), ['controller' => 'WebAuthorizations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Web Authorization'), ['controller' => 'WebAuthorizations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="crawls view ten columns content">
    <h3><?= h($crawl->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($crawl->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Crawl Mode') ?></th>
            <td><?= h($crawl->crawl_mode) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($crawl->state) ?></td>
        </tr>
        <tr>
            <th><?= __('CrawlId') ?></th>
            <td><?= h($crawl->crawlId) ?></td>
        </tr>
        <tr>
            <th><?= __('ConfigId') ?></th>
            <td><?= h($crawl->configId) ?></td>
        </tr>
        <tr>
            <th><?= __('SeedDirectory') ?></th>
            <td><?= h($crawl->seedDirectory) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $crawl->has('user') ? $this->Html->link($crawl->user->name, ['controller' => 'Users', 'action' => 'view', $crawl->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($crawl->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Rounds') ?></th>
            <td><?= $this->Number->format($crawl->rounds) ?></td>
        </tr>
        <tr>
            <th><?= __('Finished Rounds') ?></th>
            <td><?= $this->Number->format($crawl->finished_rounds) ?></td>
        </tr>
        <tr>
            <th><?= __('Limit') ?></th>
            <td><?= $this->Number->format($crawl->limit) ?></td>
        </tr>
        <tr>
            <th><?= __('Fetched Pages') ?></th>
            <td><?= $this->Number->format($crawl->fetched_pages) ?></td>
        </tr>
        <tr>
            <th><?= __('Max Url Length') ?></th>
            <td><?= $this->Number->format($crawl->max_url_length) ?></td>
        </tr>
        <tr>
            <th><?= __('Finished') ?></th>
            <td><?= h($crawl->finished) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($crawl->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($crawl->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($crawl->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Crawl Filters') ?></h4>
        <?php if (!empty($crawl->crawl_filters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Page Type') ?></th>
                <th><?= __('Url Filter') ?></th>
                <th><?= __('Text Filter') ?></th>
                <th><?= __('Block Filter') ?></th>
                <th><?= __('Crawl Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($crawl->crawl_filters as $crawlFilters): ?>
            <tr>
                <td><?= h($crawlFilters->id) ?></td>
                <td><?= h($crawlFilters->page_type) ?></td>
                <td><?= h($crawlFilters->url_filter) ?></td>
                <td><?= h($crawlFilters->text_filter) ?></td>
                <td><?= h($crawlFilters->block_filter) ?></td>
                <td><?= h($crawlFilters->crawl_id) ?></td>
                <td><?= h($crawlFilters->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CrawlFilters', 'action' => 'view', $crawlFilters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CrawlFilters', 'action' => 'edit', $crawlFilters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CrawlFilters', 'action' => 'delete', $crawlFilters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crawlFilters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Human Actions') ?></h4>
        <?php if (!empty($crawl->human_actions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Order') ?></th>
                <th><?= __('Css Path') ?></th>
                <th><?= __('Action') ?></th>
                <th><?= __('KeyCode') ?></th>
                <th><?= __('Script') ?></th>
                <th><?= __('Crawl Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($crawl->human_actions as $humanActions): ?>
            <tr>
                <td><?= h($humanActions->id) ?></td>
                <td><?= h($humanActions->order) ?></td>
                <td><?= h($humanActions->css_path) ?></td>
                <td><?= h($humanActions->action) ?></td>
                <td><?= h($humanActions->keyCode) ?></td>
                <td><?= h($humanActions->script) ?></td>
                <td><?= h($humanActions->crawl_id) ?></td>
                <td><?= h($humanActions->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'HumanActions', 'action' => 'view', $humanActions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'HumanActions', 'action' => 'edit', $humanActions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'HumanActions', 'action' => 'delete', $humanActions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $humanActions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Nutch Configs') ?></h4>
        <?php if (!empty($crawl->nutch_configs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('ConfigId') ?></th>
                <th><?= __('Force') ?></th>
                <th><?= __('Params') ?></th>
                <th><?= __('Crawl Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($crawl->nutch_configs as $nutchConfigs): ?>
            <tr>
                <td><?= h($nutchConfigs->id) ?></td>
                <td><?= h($nutchConfigs->configId) ?></td>
                <td><?= h($nutchConfigs->force) ?></td>
                <td><?= h($nutchConfigs->params) ?></td>
                <td><?= h($nutchConfigs->crawl_id) ?></td>
                <td><?= h($nutchConfigs->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NutchConfigs', 'action' => 'view', $nutchConfigs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NutchConfigs', 'action' => 'edit', $nutchConfigs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NutchConfigs', 'action' => 'delete', $nutchConfigs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nutchConfigs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Nutch Jobs') ?></h4>
        <?php if (!empty($crawl->nutch_jobs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Round') ?></th>
                <th><?= __('CrawlId') ?></th>
                <th><?= __('ConfId') ?></th>
                <th><?= __('JobId') ?></th>
                <th><?= __('Count') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($crawl->nutch_jobs as $nutchJobs): ?>
            <tr>
                <td><?= h($nutchJobs->id) ?></td>
                <td><?= h($nutchJobs->round) ?></td>
                <td><?= h($nutchJobs->crawlId) ?></td>
                <td><?= h($nutchJobs->confId) ?></td>
                <td><?= h($nutchJobs->jobId) ?></td>
                <td><?= h($nutchJobs->count) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NutchJobs', 'action' => 'view', $nutchJobs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NutchJobs', 'action' => 'edit', $nutchJobs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NutchJobs', 'action' => 'delete', $nutchJobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nutchJobs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Nutch Messages') ?></h4>
        <?php if (!empty($crawl->nutch_messages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('JobId') ?></th>
                <th><?= __('Crawl Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($crawl->nutch_messages as $nutchMessages): ?>
            <tr>
                <td><?= h($nutchMessages->id) ?></td>
                <td><?= h($nutchMessages->jobId) ?></td>
                <td><?= h($nutchMessages->crawl_id) ?></td>
                <td><?= h($nutchMessages->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'NutchMessages', 'action' => 'view', $nutchMessages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NutchMessages', 'action' => 'edit', $nutchMessages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'NutchMessages', 'action' => 'delete', $nutchMessages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nutchMessages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Page Entities') ?></h4>
        <?php if (!empty($crawl->page_entities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Domain') ?></th>
                <th><?= __('Block Path') ?></th>
                <th><?= __('Url Filter') ?></th>
                <th><?= __('Text Filter') ?></th>
                <th><?= __('Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($crawl->page_entities as $pageEntities): ?>
            <tr>
                <td><?= h($pageEntities->id) ?></td>
                <td><?= h($pageEntities->name) ?></td>
                <td><?= h($pageEntities->domain) ?></td>
                <td><?= h($pageEntities->block_path) ?></td>
                <td><?= h($pageEntities->url_filter) ?></td>
                <td><?= h($pageEntities->text_filter) ?></td>
                <td><?= h($pageEntities->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PageEntities', 'action' => 'view', $pageEntities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PageEntities', 'action' => 'edit', $pageEntities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PageEntities', 'action' => 'delete', $pageEntities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pageEntities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Seeds') ?></h4>
        <?php if (!empty($crawl->seeds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Crawl Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($crawl->seeds as $seeds): ?>
            <tr>
                <td><?= h($seeds->id) ?></td>
                <td><?= h($seeds->url) ?></td>
                <td><?= h($seeds->crawl_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Seeds', 'action' => 'view', $seeds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Seeds', 'action' => 'edit', $seeds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Seeds', 'action' => 'delete', $seeds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seeds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Spark Jobs') ?></h4>
        <?php if (!empty($crawl->spark_jobs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('JobId') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Args') ?></th>
                <th><?= __('State') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($crawl->spark_jobs as $sparkJobs): ?>
            <tr>
                <td><?= h($sparkJobs->id) ?></td>
                <td><?= h($sparkJobs->jobId) ?></td>
                <td><?= h($sparkJobs->type) ?></td>
                <td><?= h($sparkJobs->args) ?></td>
                <td><?= h($sparkJobs->state) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SparkJobs', 'action' => 'view', $sparkJobs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SparkJobs', 'action' => 'edit', $sparkJobs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SparkJobs', 'action' => 'delete', $sparkJobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sparkJobs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stop Urls') ?></h4>
        <?php if (!empty($crawl->stop_urls)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Forbidden Point') ?></th>
                <th><?= __('Crawl Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($crawl->stop_urls as $stopUrls): ?>
            <tr>
                <td><?= h($stopUrls->id) ?></td>
                <td><?= h($stopUrls->url) ?></td>
                <td><?= h($stopUrls->forbidden_point) ?></td>
                <td><?= h($stopUrls->crawl_id) ?></td>
                <td><?= h($stopUrls->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StopUrls', 'action' => 'view', $stopUrls->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StopUrls', 'action' => 'edit', $stopUrls->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StopUrls', 'action' => 'delete', $stopUrls->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stopUrls->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Web Authorizations') ?></h4>
        <?php if (!empty($crawl->web_authorizations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Login Url') ?></th>
                <th><?= __('Account') ?></th>
                <th><?= __('Password Text') ?></th>
                <th><?= __('Account Css Selector') ?></th>
                <th><?= __('Password Css Selector') ?></th>
                <th><?= __('Crawl Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($crawl->web_authorizations as $webAuthorizations): ?>
            <tr>
                <td><?= h($webAuthorizations->id) ?></td>
                <td><?= h($webAuthorizations->login_url) ?></td>
                <td><?= h($webAuthorizations->account) ?></td>
                <td><?= h($webAuthorizations->password_text) ?></td>
                <td><?= h($webAuthorizations->account_css_selector) ?></td>
                <td><?= h($webAuthorizations->password_css_selector) ?></td>
                <td><?= h($webAuthorizations->crawl_id) ?></td>
                <td><?= h($webAuthorizations->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WebAuthorizations', 'action' => 'view', $webAuthorizations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'WebAuthorizations', 'action' => 'edit', $webAuthorizations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'WebAuthorizations', 'action' => 'delete', $webAuthorizations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $webAuthorizations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
