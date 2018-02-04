<?php require_once APPPATH . 'views/admin/posts/header.php'; ?>
<a href="<?php echo base_url('site/login/logout')?>">Wyloguj</a><br>
<a href="<?php echo base_url('admin/posts/create')?>">Stwórz posta</a>
<a href="<?php echo base_url('admin/users/create')?>">Stwórz użytkownika</a>
<a href="<?php echo base_url('site/site/view')?>">Do przeglądu postów</a>
<?php foreach ($posts as $post): ?>
  <p>ID posta: <?php echo $post->id;?></p>
  <p>Tytuł posta: <?php echo $post->title;?></p>
  <p>Treść posta: <?php echo $post->body;?></p>
  <p>ID autora:<?php echo $post->user_id;?></p>
  <p>Nazwa autora:<?php echo $post->user_name;?></p>
  <p>Czas stworzenia: <?php echo unix_to_human($post->time, TRUE, 'eu');?></p>
  <a href='<?php echo base_url("admin/posts/edit/".$post->id)?>'>EDIT</a>
  <a href='<?php echo base_url("admin/posts/delete/".$post->id)?>'>DELETE</a>
  <hr>
<?php endforeach; ?>
<?php require_once APPPATH . 'views/admin/posts/footer.php'; ?>
