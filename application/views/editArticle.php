<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">


<?php foreach($Article as $row) { ?>

<form method = "POST" action = "<?php echo site_url('Blog/updateArticle');?>/<?php echo $row->Id;?>" enctype='multipart/form-data'>

<div class="form-group">
<label for="exampleInputEmail1">Title</label>
<input type="text" name = "title" class="form-control" id="exampleInputEmail1" placeholder="" value = "<?php echo $row->Title;?>">
</div>
<?php } ?>
<div class="form-group">
	<label> Select Recipe Category</label>
		<select class="form-control" name="category">
			<option value = "<?php echo $getArticleById[0]->c_id;?>"><?php echo $getArticleById['0']->Type;?></option>
		<?php  foreach($category as $row){?>
			<option value = "<?php echo $row->Id;?>"><?php echo $row->Type;?></option>
		<?php } ?>
		</select>
</div>

<div class="form-group">
<label>Preparation Time</label>
<input type="number" name = "prep" class="form-control" id="prep" placeholder="" value = "<?php echo $getArticleById['0']->prep;?>" min="0" max="60">
</div>

<div class="form-group">
<label>Cooking Time</label>
<input type="text" name = "cook" class="form-control" id="cook" placeholder="" value = "<?php echo $getArticleById['0']->cook;?>">
</div>

<div class='box-header'>
<h3 class='box-title'>Description</h3>
</div>
<!-- /.box-header -->
<div class='box-body pad'>
<textarea id="editor" name="editor" rows="10" cols="80" placeholder="Enter text ...">
<?php echo $getArticleById['0']->Description;?>
</textarea>
</div>

<div class='box-header'>
<h3 class='box-title'>Directions</h3>

</div>
<!-- /.box-header -->
<div class='box-body pad'>
<textarea id="editor2" name="editor2" rows="10" cols="80" placeholder="Directions ...">
<?php echo $getArticleById['0']->HowTo;?>
</textarea>
</div>
<br>

<div class="form-group">
<label>Ingredients</label>
<input type="text" name = "ingredients" class="form-control" id="ingredients" placeholder="" value = "<?php echo $getArticleById['0']->ingredients;?>">
</div>



<br>
<div class="form-group">
<label for="exampleInputFile">Add Feature Image</label>
<input type="file" name="userfile" id="exampleInputFile">
<br>
<label>Selected Image:</label>
<?php echo $getArticleById['0']->FeatureImage;?>
</div>
<br>
<br>
<div class="box-footer">
<button type="submit" value="upload" name="updateArticle" class="btn btn-primary">Submit</button>
</div>
</form>

</div>
</div>
</div>
