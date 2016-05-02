<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $crawl->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $crawl->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Crawls'), ['action' => 'index']) ?></li>
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
</nav>
<div class="crawls form ten columns content">
    <?= $this->Form->create($crawl) ?>
    <fieldset>
        <legend><?= __('Edit Crawl') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('crawl_mode');
            echo $this->Form->input('rounds');
            echo $this->Form->input('finished_rounds');
            echo $this->Form->input('limit');
            echo $this->Form->input('fetched_pages');
            echo $this->Form->input('max_url_length');
            echo $this->Form->input('state');
            echo $this->Form->input('crawlId');
            echo $this->Form->input('configId');
            echo $this->Form->input('seedDirectory');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('finished', ['empty' => true]);
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
