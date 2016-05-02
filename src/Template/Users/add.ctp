<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Crawl Filters'), ['controller' => 'CrawlFilters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crawl Filter'), ['controller' => 'CrawlFilters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Crawls'), ['controller' => 'Crawls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crawl'), ['controller' => 'Crawls', 'action' => 'add']) ?></li>
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
        <li><?= $this->Html->link(__('List Page Entity Fields'), ['controller' => 'PageEntityFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page Entity Field'), ['controller' => 'PageEntityFields', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scent Jobs'), ['controller' => 'ScentJobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scent Job'), ['controller' => 'ScentJobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Spark Jobs'), ['controller' => 'SparkJobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Spark Job'), ['controller' => 'SparkJobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stat Accesses'), ['controller' => 'StatAccesses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stat Access'), ['controller' => 'StatAccesses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stop Urls'), ['controller' => 'StopUrls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stop Url'), ['controller' => 'StopUrls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Web Authorizations'), ['controller' => 'WebAuthorizations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Web Authorization'), ['controller' => 'WebAuthorizations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('name');
            echo $this->Form->input('avatar');
            echo $this->Form->input('avatar_big');
            echo $this->Form->input('point');
            echo $this->Form->input('level');
            echo $this->Form->input('exp');
            echo $this->Form->input('status');
            echo $this->Form->input('group_id', ['options' => $groups]);
            echo $this->Form->input('referrer');
            echo $this->Form->input('ip');
            echo $this->Form->input('statusflag');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
