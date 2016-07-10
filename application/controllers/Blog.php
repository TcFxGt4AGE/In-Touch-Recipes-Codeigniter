<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* User class.
*
* @extends CI_Controller
*/
class Blog extends CI_Controller {
/**
* __construct function.
*
* @access public
* @return void
*/
public function __construct() {
parent::__construct();
$this->load->library(array('session'));
$this->load->helper(array('url'));
$this->load->helper('cookie');
$this->load->helper('form');
$this->load->model('Blog_model');
$this->load->library('pagination');
}

public function index() {
$this->load->view('header');
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();
$this->load->view('articleHome',$data);
$this->load->view('footer');
}

public function sorry() {
$this->load->view('header');
$this->load->view('sorry');
$this->load->view('footer');
}

public function addCategory() {
if (! $this->session->userdata('username'))
    {
    redirect('Blog/sorry'); // the user is not logged in, redirect them!
    }
$this->load->view('header');
if(isset($_POST['addCategory']))
{
$data = array('Type'=>$this->input->post('title'),
'Description'=>$this->input->post('desc'),
'CreatedDate'=>date('Y-m-d h:i:s')
);
$this->db->insert('Category',$data);
$data['msg'] = "Category inserted Successfully";
}
$data['error'] = '';
$this->load->view('addCategory',$data);
$this->load->view('footer');
}

public function addArticle() {
if (! $this->session->userdata('username'))
	{
	redirect('Blog/sorry'); // the user is not logged in, redirect them!
	}
$this->load->view('headerrecipes');
if(isset($_POST['addArticle']))
{
if (isset($_FILES['userfile']))
{
$this->load->library('upload');

{
/*
$_FILES['userfile']['name']= str_replace(' ', '-',$files['userfile']['name'][$i]);
$_FILES['userfile']['type']= $files['userfile']['type'][$i];
$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
$_FILES['userfile']['error']= $files['userfile']['error'][$i];
$_FILES['userfile']['size']= $files['userfile']['size'][$i];
*/
$this->upload->initialize($this->set_upload_options());
$this->upload->do_upload();
$fileName = str_replace(' ', '-',$_FILES['userfile']['name']);
$images[] = $fileName;
}
$fileName = implode(',',$images);
$task = $this->Blog_model->addArticle($fileName);
}
else
{
$filename='';
$task = $this->Blog_model->addArticle($filename);
}
}
$data['category'] = $this->Blog_model->allCategory();
$this->load->view('addArticle', $data);
$this->load->view('footer');
}

private function set_upload_options()
{
$config = array();
$config['upload_path'] = './upload/';
$config['allowed_types'] = 'gif|jpg|png';
$config['max_size']      = '0';
$config['overwrite']     = FALSE;
return $config;
}
public function allRecipesCategory()
{
$this->load->view('headerrecipes');
$this->db->select('*');
$this->db->from('Category');
$data['Category'] = $this->db->get()->result();
$this->load->view('allRecipesCategory',$data);
$this->load->view('footer');
}
public function allCategory()
{
if (! $this->session->userdata('username'))
	{
	redirect('Blog/sorry'); // the user is not logged in, redirect them!
	}
$this->load->view('header');
$this->db->select('*');
$this->db->from('Category');
$data['Category'] = $this->db->get()->result();
$this->load->view('allCategory',$data);
$this->load->view('footer');
}
public function allArticle()
{
$this->load->view('headerrecipes');
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();
$this->load->view('allArticle',$data);
$this->load->view('footer');
}
public function articleHome()
{
$this->load->view('header');
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();

$config = array();
$config["base_url"] = base_url('Blog/articleHome');
$config['total_rows'] =   $this->db->count_all("Article");//here we will count all the data from the table
$config['per_page'] = 5;//number of data to be shown on single page
$config["uri_segment"] = 2;
$this->pagination->initialize($config);
$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
$data["allData"] = $this->Blog_Model->articleHome($config["per_page"], $page);
$data["links"] = $this->pagination->create_links();//create the link for pagination
$this->load->view('allArticle',$data);
$this->load->view('footer');
}
public function editArticle($id)
{
if (! $this->session->userdata('username'))
	{
	redirect('Blog/sorry'); // the user is not logged in, redirect them!
	}
$this->load->view('headerrecipes');
$this->db->where('Id',$id);
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();
$data['category'] = $this->Blog_model->allCategory();
$data['getArticleById'] = $this->Blog_model->getArticleById($id);
$data['main_content'] = 'editArticle';
$this->load->view('editArticle',$data);
$this->load->view('footer');
}
public function viewArticle($id)
{
$this->load->view('headerrecipes');
$this->db->where('Id',$id);
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();
$this->load->view('viewArticle',$data);
$this->load->view('footer');
}
public function deleteArticle($id)
{
if (! $this->session->userdata('username'))
	{
	redirect('Blog/sorry'); // the user is not logged in, redirect them!
	}
$this->load->view('headerrecipes');
$this->db->where('Id',$id);
$this->db->delete('Article');
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();
$this->load->view('allArticle',$data);
$this->load->view('footer');
}
public function updateArticle($id)
{
$this->load->view('headerrecipes');
$this->db->where('Id',$id);
$data = array(
'Title'=>$this->input->post('title'),
'username'=>$this->session->userdata('username'),
'Category_id'=>$this->input->post('category'),
'prep'=>$this->input->post('prep'),
'cook'=>$this->input->post('cook'),
'Description'=>$this->input->post('editor'),
'HowTo'=>$this->input->post('editor2'),
'DateTime'=>date('Y-m-d h:i:s'),
'ingredients'=>$this->input->post('ingredients'),
'FeatureImage'=>$_FILES['userfile']['name'],
);
$this->db->update('Article', $data);
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();
$this->load->view('allArticle',$data);
$this->load->view('footer');
}
public function viewCategory($id)
{
$this->load->view('headerrecipes');
$this->db->where('Id',$id);
$this->db->select('*');
$this->db->from('Category');
$data['Category'] = $this->db->get()->result();
$this->db->where('Category_id',$id);
$this->db->select('*');
$this->db->from('Article');
$data['Article'] = $this->db->get()->result();
$this->load->view('viewCategory',$data);
$this->load->view('footer');
}
public function editCategory($id)
{
$this->load->view('headerrecipes');
$data['getCategoryById'] = $this->Blog_model->getCategoryById($id);
$this->load->view('editCategory',$data);
$this->load->view('footer');
}
public function deleteCategory($id)
{
$this->load->view('headerrecipes');
$this->db->where('Id',$id);
$this->db->delete('Category');
$this->db->select('*');
$this->db->from('Category');
$data['Category'] = $this->db->get()->result();
$this->load->view('allCategory',$data);
$this->load->view('footer');
}
public function updateCategory($id)
{
$this->load->view('headerrecipes');
$this->db->where('Id',$id);
$data = array(
'Type'=>$this->input->post('type'),
'Description'=>$this->input->post('description'),
'CreatedDate'=>date('Y-m-d h:i:s'),
);
$this->db->update('Category',$data);
$this->db->select('*');
$this->db->from('Category');
$data['Category'] = $this->db->get()->result();
$this->load->view('allCategory',$data);
$this->load->view('footer');
}
}