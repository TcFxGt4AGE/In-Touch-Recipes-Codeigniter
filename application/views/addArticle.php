<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<h1>
Add a New Recipe
</h1>
<br>
<form method = "POST" action = "<?php echo site_url('Blog/addArticle');?>" enctype='multipart/form-data'>
<div class="form-group">
<label for="exampleInputEmail1">Title</label>
<input type="text" name = "title" class="form-control" id="exampleInputEmail1" placeholder="">
</div>

<div class="form-group">
<label> Select Recipe Category</label>
<select class="form-control" name="category">
<option>Select</option>
<?php  foreach($category as $row){?>
<option value = "<?php echo $row->Id;?>"><?php echo $row->Type;?></option>
<?php } ?>
</select>
</div>

<div class="form-group">
<label>Preparation Time</label>
<input type="number" name = "prep" class="form-control" id="prep" placeholder="10 min ..." min="0" max="60">
</div>

<div class="form-group">
<label>Cooking Time</label>
<input type="text" name = "cook" class="form-control" id="cook" placeholder="20 min ...">
</div>

<div class='box-header'>
<h3 class='box-title'>Description</h3>
</div>
<!-- /.box-header -->
<div class='box-body pad'>
<textarea id="editor" name="editor" rows="10" cols="80" placeholder="Enter text ...">
</textarea>
</div>

<div class='box-header'>
<h3 class='box-title'>Directions</h3>

</div>
<!-- /.box-header -->
<div class='box-body pad'>
<textarea id="editor2" name="editor2" rows="10" cols="80" placeholder="Directions ...">
</textarea>
</div>
<br>

<div class="form-group">
<label>Ingredients</label>
<input type="text" name = "ingredients" class="form-control" id="ingredients" placeholder="Milk ...">
</div>



<br>
<div class="form-group">
<label for="exampleInputFile">Add Feature Image</label>
<input type="file" name="userfile" id="exampleInputFile">
</div>
<br>
<br>
<div class="box-footer">
<button type="submit" value="upload" name="addArticle" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>

