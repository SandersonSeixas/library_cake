<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PROJETO BIBLIOTECA - VITTOR">
    <meta name="author" content="Grupo Vittor... nome1,2,3...">

    <title><?= $this->fetch('title') ?> </title>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <div class="container-fluid">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  </div>
</body>
</html>
