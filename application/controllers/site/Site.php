<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Site_model');
    }

    public function index()
    {
      echo "test";
    }

    public function view()
    {
        $data['posts']=$this->Site_model->read('posts');      
    
        // $config = array();
		// $config['base_url'] = base_url()."articles/index";
		// $config['total_rows'] = $this->Database_model->record_count("posts");
		// $config['per_page'] = 3;
		// $config['num_links'] = 3;

		// $this->pagination->initialize($config);

		// $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// // $data['results'] = $this->Posts_model->fetch_posts($config['per_page'], $page, "date", "ASC");
        // $data['links'] = $this->pagination->create_links();
        $config=array();
        $config['base_url'] ='http://localhost/ci/public_html/site/site/view';
        $config['total_rows'] = $this->Site_model->count("posts");
        $config['per_page'] = 5;
        $config['num_links'] = 3;
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['links'] = $this->pagination->create_links();

        $data['posts'] = $this->Site_model->fetch_posts("posts", $config['per_page'], $page);

        $this->load->view('site/view', $data);
    }




    public function post($id)
    {
        $where=array('id'=>$id);
        $where_comment=array('post_id'=>$id);
        $data['id']=$this->Site_model->get('posts',$where);
        $data['comments']=$this->Site_model->get_result('comments',$where_comment);
        if (isset($_POST['comment']))
        {
          if ($this->form_validation->run('comments'))
            {
              $time=time();
              $data=array( 
                'body'=>$this->input->post('body', true),
                'nick'=>$this->input->post('nick', true),
                'post_id'=>$id,
                'time'=>$time
              );
              $this->Site_model->create('comments',$data);
              $this->session->set_flashdata('info', 'Dodano komentarz');
              refresh();
            }
            else
            {
              $this->session->set_flashdata('info', validation_errors());
              refresh();
            }
        }
        $this->load->view('site/post', $data);
    }
    public function delete($id)
    {
      if (logged_in()==false)
      {
        redirect('site/login/login');
        return false;
      }
      $this->Admin_model->delete('comment','id',$id);
      $this->session->set_flashdata('info', 'Usunięto komentarz');
      refresh();
    }
}

