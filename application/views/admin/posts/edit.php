<?php require_once APPPATH . 'views/admin/posts/header.php'; ?>
<a href="<?php echo base_url('site/login/logout')?>">Wyloguj</a><br>
<a href="<?php echo base_url('admin/posts/read')?>">Lista postów</a>
<p>Wpisz wartości w polach które chcesz edytować</p>
<?php echo form_open()?>
  <label for="title">Tytuł posta:</label>
  <input id="title" type="text" name="title" value="<?php echo $id->title ?>"/><br> <!--name powinien być różny od type-->
  <label for="body">Treść posta</label>
  <textarea id="body" name="body" rows="10" cols="50" required><?php echo $id->body ?>
  </textarea><br>
  <input type="submit" name="edit" value="Edytuj"/>
<?php echo form_close()?>
<?php if ($this->session->flashdata('info')): ?><!--sposób zapisu że eśli coś się wykonuje to coś pokazuje. Zapis z dwukropkiem. Tu się zaczyna-->
  <div>
    <?php echo $this->session->flashdata('info') ?>
  </div>
<?php endif;?><!--Tu się kończy-->
<?php require_once APPPATH . 'views/admin/posts/footer.php'; ?>
