<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<div class="table-responsive">
<table id="example1" class="table table-bordered table-striped table-condensed">
<thead>
<tr>
<th>Title</th>
<th>Description</th>
<th>Published On</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($Category as $row) { ?>
<tr>
<td><a href = "<?php echo site_url('Blog/viewCategory');?>/<?php echo $row->Id;?>" style="color: #337ab7;"><?php echo $row->Type;?></td>
<td><?php echo $row->Description;?></td>
<td><?php echo $row->CreatedDate;?></td>
<td>
<a href="<?php echo site_url('Blog/deleteCategory');?>/<?php echo $row->Id;?>">Delete</a></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>