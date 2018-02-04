<?php
$config = array(
  'signup'=>array(
        array(
                'field' => 'name',
                'label' => 'Login',
                'rules' => 'trim|required|min_length[5]|max_length[20]|is_unique[users.name]',
                'errors'=>array(
                  'is_unique'=>'%s jest już zajęty'
                )
        ),
        array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email|is_unique[users.email]',
                'errors'=>array(
                  'is_unique'=>'%s jest już zajęty'
                )

        ),
        array(
                'field' => 'password',
                'label' => 'Hasło',
                'rules' => 'trim|required|min_length[5]|max_length[50]|matches[re_password]'
        ),
        array(
                'field' => 're_password',
                'label' => 'Powtórzenie hasła',
                'rules' => 'trim|required'
        )
      ),
  'edit'=>array(
        array(
                'field' => 'name',
                'label' => 'Nowy Login',
                'rules' => 'trim|min_length[5]|max_length[20]|required'
        ),
        array(
                'field' => 'email',
                'label' => 'Nowy E-mail',
                'rules' => 'trim|valid_email|required'
        ),
        array(
                'field' => 'password',
                'label' => 'Nowe Hasło',
                'rules' => 'trim|min_length[5]|max_length[50]'
        )
      ),
  'login'=>array(
        array(
                'field' => 'name',
                'label' => 'Login',
                'rules' => 'trim|required'
        ),
        array(
                'field' => 'password',
                'label' => 'Hasło',
                'rules' => 'trim|required'
        )
      ),
  'post'=>array(
        array(
                'field' => 'title',
                'label' => 'Tytuł posta',
                'rules' => 'required'
        ),
        array(
                'field' => 'body',
                'label' => 'Treść ',
                'rules' => 'required'
        )
        ),
   'comments'=>array(
        array(
                'field' => 'body',
                'label' => 'Treść komentarza',
                'rules' => 'required'
        ),
        array(
                'field' => 'nick',
                'label' => 'Nick ',
                'rules' => 'required'
        )
        ) 
);
