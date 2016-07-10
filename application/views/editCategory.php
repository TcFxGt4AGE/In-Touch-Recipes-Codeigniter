<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<form role="form" method = "POST" action = "<?php echo site_url('Blog/updateCategory');?>">
<div class="box-body">
<div class="form-group">
<label for="exampleInputEmail1">Title</label>
<input type="text" name = "title" class="form-control" id="exampleInputEmail1" placeholder="" value= "<?php echo $getCategoryById['0']->Type;?>">
</div>
<div>
<label>Description</label>
<textarea class="form-control" rows="3" name="desc" placeholder="Enter ...">
<?php echo $getCategoryById['0']->Description;?></textarea>
</div>
</div><!-- /.box-body -->
<div class="box-footer">
<button type="submit" name = "addCategory" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>
<?php if(!empty($msg)){ echo $msg;};?>