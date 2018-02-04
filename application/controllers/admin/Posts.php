<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model');//wrzucone, żeby w każdej funkcji osobno nie ładować modelu
  }
  public function read()
  {
    if (logged_in()==false)
    {
      redirect('site/login/login');
      return false;
    }
      $data['posts']=$this->Admin_model->read('posts');//zapisanie wyników wyszukiwania w tablicy
      $this->load->view('admin/posts/read', $data);
  }
  public function create()
  {
    if (logged_in()==false)
    {
      redirect('site/login/login');
      return false;
    }
    if (isset($_POST['post']))
    {
      if ($this->form_validation->run('post'))
        {
          $time=time();
          $data=array( 
            'body'=>$this->input->post('body', true),
            'title'=>$this->input->post('title', true),
            'user_id'=>$this->session->userdata('id'),
            'user_name'=>$this->session->userdata('name'),
            'time'=>$time
          );
          $this->Admin_model->create('posts',$data);
          $this->session->set_flashdata('info', 'Post dodano pomyślnie');
          refresh();
        }
        else
        {
          $this->session->set_flashdata('info', validation_errors());
          refresh();
        }
    }
    $this->load->view('admin/posts/create');
  }
  public function delete($id)
  {
    if (logged_in()==false)
    {
      redirect('site/login/login');
      return false;
    }
    $this->Admin_model->delete('posts','id',$id);
    $this->session->set_flashdata('info', 'Usunięto post');
    redirect('admin/posts/read');
  }
  public function edit($id)
  {
    if (logged_in()==false)
    {
      redirect('site/login/login');
      return false;
    }
    $where=array('id'=>$id);
    $data['id']=$this->Admin_model->get('posts',$where);
    if($data['id']==null)
    {
      redirect('admin/users/read');
    }
    $id=$data['id']->id;
    if (isset($_POST['edit']))
    {
      if ($this->form_validation->run('post'))
        {
          $data_edit=array(
            'title'=>$this->input->post('title', true),
            'body'=>$this->input->post('body', true)
          );
          $this->Admin_model->edit('posts','id',$id,$data_edit);
          $this->session->set_flashdata('info', 'Edycja przebiegła pomyślnie');
          refresh();
        }
        else {
            $this->session->set_flashdata('info', validation_errors());
            refresh();
        }
    }
    $this->load->view('admin/posts/edit', $data);
  }
}
