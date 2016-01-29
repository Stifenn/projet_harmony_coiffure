<?php $this->layout('layoutBack', ['title' => 'slidersubmit']) ?>

<?php $this->start('main_content') ?>
<?php var_dump($_POST);
var_dump($_FILES);?>

<a href="<?= $this->url('slider') ?>">Retour</a>

<?php $this->stop('main_content') ?>