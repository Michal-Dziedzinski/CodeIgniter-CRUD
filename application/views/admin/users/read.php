<?php require_once APPPATH . 'views/admin/users/header.php'; ?>
  <body>
  <a href="<?php echo base_url('site/login/logout')?>">Wyloguj</a><br>
  <a href="<?php echo base_url('admin/users/create')?>">Rejestracja</a>
  <?php foreach ($users as $user): ?>
    <p>ID: <?php echo $user->id;?></p>
    <p>Login: <?php echo $user->name;?></p>
    <p>E-mail: <?php echo $user->email;?></p>
    <p>Hasło: <?php echo $user->password;?></p>
    <a href='<?php echo base_url("admin/users/edit/".$user->id)?>'>EDIT</a>
    <a href='<?php echo base_url("admin/users/delete/".$user->id)?>'>DELETE</a>
  <?php endforeach; ?>
<?php require_once APPPATH . 'views/admin/users/footer.php'; ?>
