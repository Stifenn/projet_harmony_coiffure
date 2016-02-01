<?php $this->layout('layout'); ?>

<?php $this->start('Ajout_Cire') ?>

<form action="#" method="post">
    <label for="name">Nom:</label>
     <input class="w-input" type="text" placeholder="Entrer votre Nom" name="name">
   <label for="email">Email:</label>
     <input class="w-input" placeholder="Entrer votre Email" type="text" name="email" required="required">
   <label for="email">Votre Message:</label>
     <textarea class="w-input message" placeholder="Entrer votre Message" name="message"></textarea><br>
   <input class="w-button" type="submit" value="Send">
</form>

<?php $this->stop('Ajout_Comire') ?>

<?php $this->start('commentaire') ?>


<?php $this->stop('commentaire') ?>
