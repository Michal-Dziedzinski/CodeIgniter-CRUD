<?php require_once APPPATH . 'views/admin/posts/header.php'; ?>
<?php if (logged_in()==false): ?>
  <a href="<?php echo base_url('site/login/login')?>">Zaloguj</a><br> 
<?php endif;?>
<?php if (logged_in()==true): ?>
  <a href="<?php echo base_url('site/login/logout')?>">Wyloguj</a><br>
<?php endif;?>
<?php echo $links; ?>
<?php foreach ($posts as $post): ?>
  <h2><?php echo $post->title;?></h2>
  <p>Treść posta: <?php echo substr(strip_tags($post->body),0,100).'...';?></p><a href='<?php echo base_url("site/site/post/".$post->id)?>'>Czytaj więcej</a>
  <p>Autor: <?php echo $post->user_name;?></p>
  <p>Stworzono: <?php echo unix_to_human($post->time, TRUE, 'eu');?></p>
  <hr>
<?php endforeach; ?>
<?php require_once APPPATH . 'views/admin/posts/footer.php'; ?>
