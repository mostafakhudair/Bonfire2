<?= $this->extend('master') ?>

<?= $this->section('main') ?>

    <x-page-head>
        <h2>Search Results</h2>
    </x-page-head>

    <x-admin-box>
    <?php if(! isset($results) || ! count($results)) : ?>
        <div class="alert alert-info">No records match your search criteria. Revise the criteria and try again.</div>
    <?php else : ?>
        <?php foreach($results as $name => $info): ?>
            <fieldset>
                <legend><?= esc(ucwords($name)) ?></legend>

                <?= $this->setData(['rows' => $info['results']])->include($info['provider']->resultView()) ?>

                <dd class="d-flex justify-content-end">
                    <a href="<?= site_url($info['url']) ?>">See all <?= esc($name) ?></a>
                </dd>
            </fieldset>
        <?php endforeach ?>
    <?php endif ?>
    </x-admin-box>

<?= $this->endSection() ?>
