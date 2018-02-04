<?php require_once APPPATH . 'views/admin/posts/header.php'; ?>
<a href="<?php echo base_url('admin/posts/logout')?>">Wyloguj</a><br>
<a href="<?php echo base_url('admin/posts/read')?>">Posty</a>
<?php if ($this->session->flashdata('info')): ?><!--Sposób zapisu że jeśli coś się wykonuje to coś pokazuje. Zapis z dwukropkiem. Tu się zaczyna-->
  <div>
    <?php echo $this->session->flashdata('info') ?>
  </div>
<?php endif;?><!--Tu się kończy-->
<?php echo form_open()?>
  <label for="title">Tytuł posta:</label>
  <input type="text" name="title" id="title"/><br> <!--name powinien być różny od type-->
  <label for="body">Treść posta</label>
  <textarea id="body" name="body"rows="10" cols="50" placeholder="treść posta..." required>
  </textarea><br>
  <input type="submit" name="post" value="Dodaj"/>
<?php echo form_close()?>
<?php require_once APPPATH . 'views/admin/posts/footer.php'; ?>
