<?php require_once APPPATH . 'views/admin/users/header.php'; ?>
<a href="<?php echo base_url('site/login/logout')?>">Wyloguj</a><br>
<?php if ($this->session->flashdata('info')): ?><!--Sposób zapisu że jeśli coś się wykonuje to coś pokazuje. Zapis z dwukropkiem. Tu się zaczyna-->
  <div>
    <?php echo $this->session->flashdata('info') ?>
  </div>
<?php endif;?><!--Tu się kończy-->
<a href="<?php echo base_url('admin/users/read')?>">Lista Userów</a>
<?php echo form_open()?>
  <label for="name">Login:</label>
  <input type="text" name="name" id="name" required maxlength="20"/><br>
  <label for="email">E-mail:</label>
  <input type="email" name="email" id="email"/><br>
  <label for="password">Hasło:</label>
  <input type="text" name="password" id="password" required maxlength="50"/><br>
  <label for="re_password">Powtórz hasło:</label>
  <input type="text" name="re_password" id="re_password" required maxlength="50"/><br>
  <input type="submit" name="register" value="Zarejetruj"/>
<?php echo form_close()?>
<a href="<?php echo base_url('admin/posts/login')?>">Panel logowania</a>
<?php require_once APPPATH . 'views/admin/users/footer.php'; ?>
