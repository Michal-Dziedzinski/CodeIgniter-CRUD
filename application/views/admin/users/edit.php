<?php require_once APPPATH . 'views/admin/users/header.php'; ?>
<a href="<?php echo base_url('site/login/logout')?>">Wyloguj</a><br>
<a href="<?php echo base_url('admin/users/read')?>">Lista Userów</a>
<p>Wpisz wartości w polach które chcesz edytować</p>
<?php echo form_open()?>
    <label for="login">Nowy login:</label>
    <input type="text" name="name" id="name" value="<?php echo $id->name ?>"/><br>
    <label for="haslo">Nowy e-mail:</label>
    <input type="email" name="email" id="email" value="<?php echo $id->email ?>"/><br>
    <label for="haslo">Nowe hasło:</label>
    <input type="text" name="password" id="password"/><br>
    <input type="submit" name="edit" value="Edytuj"/>
<?php echo form_close()?>
<?php if ($this->session->flashdata('info')): ?><!--sposób zapisu że eśli coś się wykonuje to coś pokazuje. Zapis z dwukropkiem. Tu się zaczyna-->
  <div>
    <?php echo $this->session->flashdata('info') ?>
  </div>
<?php endif;?><!--Tu się kończy-->
<?php require_once APPPATH . 'views/admin/users/footer.php'; ?>
