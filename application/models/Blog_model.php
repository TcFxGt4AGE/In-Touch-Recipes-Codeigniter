<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Blog_model extends CI_Model {
public function __construct() {
parent::__construct();
$this->load->database();
}
public function addArticle($fileName){
$data = array('Title'=>$this->input->post('title'),
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

$this->db->insert('Article',$data);
$articleId = $this->db->insert_id();
if($fileName!='' ){
$filename1 = explode(',',$fileName);
foreach($filename1 as $file){
$file_data = array(
'FileName' => $file,
'DateTimeSaved' => date('Y-m-d h:i:s'),
'ArticleId' => $articleId,
'CategoryId' => $this->input->post('category')
);
$this->db->insert('UploadedFile', $file_data);
}
}
}

public function allCategory()
{
$this->db->select('*');
$this->db->from('Category');
return  $this->db->get()->result();
}
public function getArticleById($id)
{
$this->db->select('Article.*,Category.Type as Type,Category.Id as c_id,');
$this->db->from('Article');
$this->db->join('Category','Category.Id = Article.Category_id');
$this->db->where('Article.Id',$id);
return  $this->db->get()->result();
}
public function getCategoryById($id)
{
$this->db->select('*');
$this->db->from('Category');
$this->db->where('Id',$id);
return  $this->db->get()->result();
}
public function articleHome()
{
$this->db->limit($limit, $start);//here we will set the limit according to the value you will get from your controller function
$this->db->select('*');
$this->db->from('Article');
return $this->db->get()->result();
}
}