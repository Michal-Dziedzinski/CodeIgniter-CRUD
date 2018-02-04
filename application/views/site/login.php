<?php require_once APPPATH . 'views/admin/posts/header.php'; ?>
<?php if ($this->session->flashdata('info')): ?><!--Sposób zapisu że jeśli coś się wykonuje to coś pokazuje. Zapis z dwukropkiem. Tu się zaczyna-->
  <div>
    <?php echo $this->session->flashdata('info') ?>
  </div>
<?php endif;?><!--Tu się kończy-->
<a href="<?php echo base_url('site/site/view')?>">Do przeglądu postów</a>
<?php echo form_open()?>
  <label for="name">Login:</label>
  <input type="text" name="name" id="name" required/><br> <!--name powinien być różny od type-->
  <label for="password">Hasło:</label>
  <input type="text" name="password" id="password" required/><br>
  <input type="submit" name="login" value="Zaloguj"/>
<?php echo form_close()?>
<?php require_once APPPATH . 'views/admin/posts/footer.php'; ?>
