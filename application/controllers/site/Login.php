<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
  public function __construct()
  {
      parent::__construct();
      $this->load->model('Admin_model');//wrzucone, żeby w każdej funkcji osobno nie ładować modelu
  }
  public function login()
  { //sprawdzenie czy został wciśnięty przycisk logowania
    if (isset($_POST['login']))
    {
      if ($this->form_validation->run('login'))
        {
          //pobieranie wartości z formularza
          $data_users=array(
            'name'=>$this->input->post('name', true),//wartość true zapobiega SQL injection
            'password'=>$this->input->post('password', true)
          );
          //pobranie z bazy danych użytkownika o danym loginie
          $where=array('name'=>$data_users['name']);
          $data['login']=$this->Admin_model->get('users',$where);
          //jeśli nie ma takiego użytkownika
          if($data['login']==null)
          {
            $this->session->set_flashdata('info', 'Nie ma takiego użytkownika o takim loginie');
            refresh();
            return false;
          }
          //jeśli jest taki użytkownik to sprawdzamy czy poprawne jest hasło
          if (!password_verify($data_users['password'],$data['login']->password))
          {
            $this->session->set_flashdata('info', 'To hasło jest niepoprawne');
            refresh();
            return false;
          }
          //tutaj już wiadomo że poprawny est login i hasło użużytkownika
          $data_login=array(
              'id'=>$data['login']->id,
              'name'=>$data['login']->name,
              'email'=>$data['login']->email,
              'logged_in'=>true,
          );
          $this->session->set_userdata($data_login);
          redirect('admin/posts/read');
          $this->load->view('admin/posts/read');
        }
        else
        {
            $this->session->set_flashdata('info', validation_errors());
            refresh();
        }
    }
    $this->load->view('site/login');
  }
  public function logout()
  {
    if (logged_in()==false)
    {
      redirect('site/login/login');
      return false;
    }
    $this->session->sess_destroy();
    redirect('site/login/login');
    $this->load->view('site/login/login');
  }
}

/* End of file Login.php */
