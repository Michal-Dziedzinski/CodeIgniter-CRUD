<?php require_once APPPATH . 'views/admin/posts/header.php'; ?>
<?php if (logged_in()==false): ?>
  <a href="<?php echo base_url('site/login/login')?>">Zaloguj</a><br> 
<?php endif;?>
<?php if (logged_in()==true): ?>
  <a href="<?php echo base_url('site/login/logout')?>">Wyloguj</a><br>
<?php endif;?>
<a href="<?php echo base_url('site/site/view')?>">Powrót</a><br>
<h2><?php echo $id->title;?></h2>
<p>Treść posta: <?php echo $id->body;?></p>
<p>Autor: <?php echo $id->user_name;?></p>
<p>Stworzono: <?php echo unix_to_human($id->time, TRUE, 'eu');?></p>
<hr>
<?php foreach (array_reverse($comments) as $comment): ?>
  <p>Treść komentarza: <?php echo $comment->body;?></p>
  <p>Autor: <?php echo $comment->nick;?></p>
  <p>Stworzono: <?php echo unix_to_human($comment->time, TRUE, 'eu');?></p>
  <hr>
  <?php if (logged_in()==true): ?>
     <a href='<?php echo base_url("admin/posts/delete/".$comment->id)?>'>DELETE</a><br>
  <?php endif;?>
<?php endforeach; ?>
<?php echo form_open()?>
    <label for="body">Treść komentarza:</label>
    <textarea id="body" name="body"rows="10" cols="50" placeholder="treść komentarza..." required>
    </textarea><br>
    <label for="nick">Nick:</label>
    <input type="text" name="nick" id="nick"/><br> <!--name powinien być różny od type-->
    <input type="submit" name="comment" value="Skomentuj"/>
<?php echo form_close()?>
<?php if ($this->session->flashdata('info')): ?>
  <div>
    <?php echo $this->session->flashdata('info') ?>
  </div>
<?php endif;?>
<?php require_once APPPATH . 'views/admin/posts/footer.php'; ?>