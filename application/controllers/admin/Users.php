<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model');//wrzucone, żeby w każdej funkcji osobno nie ładować modelu
  }

  public function create()
  {
    if (logged_in()==false)
    {
      redirect('site/login/login');
      return false;
    }
    if (isset($_POST['register']))
    {
      if ($this->form_validation->run('signup'))
        {
          $data=array(
            'name'=>$this->input->post('name', true),//wartość true zapobiega SQL injection
            'email'=>$this->input->post('email', true),
            'password'=>password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
          );
          $this->Admin_model->create('users',$data);
          $this->session->set_flashdata('info', 'Rejestracja przebiegła pomyślnie');
          refresh();
        }
        else {
            $this->session->set_flashdata('info', validation_errors());
            refresh();
        }
    }
    $this->load->view('admin/users/create');
  }
  public function read()
  {
    if (logged_in()==false)
    {
      redirect('site/login/login');
      return false;
    }
    $data['users']=$this->Admin_model->read('users');//zapisanie wyników wyszukiwania w tablicy
    $this->load->view('admin/users/read', $data);
  }
  public function edit($variable)
  {
    if (logged_in()==false)
    {
      redirect('site/login/login');
      return false;
    }
    $where=array('id'=>$variable);
    $data['id']=$this->Admin_model->get('users',$where);
    if($data['id']==null)
    {
      redirect('admin/users/read');
    }
    $id=$data['id']->id;
    $email=$data['id']->email;
    $name=$data['id']->name;
    $password=$data['id']->password;
    if (isset($_POST['edit']))
    {
      if ($this->form_validation->run('edit'))
        {
          $data_edit=array(
            'name'=>$this->input->post('name', true),
            'email'=>$this->input->post('email', true),
            'password'=>password_hash($this->input->post('password', true), PASSWORD_DEFAULT));
          $where=array('email'=>($data_edit['email']));
          $data['email']=$this->Admin_model->get('users',$where);
          if($data['email']!=null)
          {
            $id_email=$data['email']->id;
            if ($id!=$id_email)
            {
              $this->session->set_flashdata('info', 'Ten Login jest już zajęty!');
              refresh();
              return false;
            }
            else {
              $data_edit['email']=$email;
            }
          }
          $where=array('name'=>($data_edit['name']));
          $data['name']=$this->Admin_model->get('users',$where);
          if($data['name']!=null)
          {
            $id_name=$data['name']->id;
            if ($id!=$id_name)
            {
              $this->session->set_flashdata('info', 'Ten E-mail jest już zajęty!');
              refresh();
              return false;
            }
            else {
              $data_edit['name']=$name;
            }
          }
          if (empty($_POST['password']))
          {
            $data_edit['password']=$password;
          }
          $this->Admin_model->edit('users','id',$id,$data_edit);
          $this->session->set_flashdata('info', 'Edycja przebiegła pomyślnie');
          refresh();
        }
        else {
            $this->session->set_flashdata('info', validation_errors());
            refresh();
        }
    }
    $this->load->view('admin/users/edit', $data);
  }
  public function delete($variable)
  {
    if (logged_in()==false)
    {
      redirect('site/login/login');
      return false;
    }
    $this->Admin_model->delete('users','id',$variable);
    $this->session->set_flashdata('info', 'Usunięto użytkownika');
    redirect('admin/users/read');
  }
}
