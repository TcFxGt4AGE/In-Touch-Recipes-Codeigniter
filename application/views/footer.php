	<hr>
	<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Site By: <a href="http://kaijser.net">Derek Kaijser</a> &copy; 2016</p>
                </div>
            </div>
        </div>
    

<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/js/forms.js');?>" type="text/javascript"></script>
<!-- CK Editor -->
<script src="<?php echo base_url('assets/js/plugins/ckeditor/ckeditor.js');?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>" type="text/javascript"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('assets/js/clean-blog.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
//CKEDITOR.replace('editor2');
//bootstrap WYSIHTML5 - text editor
$("#editor, #editor2").wysihtml5();
});
</script>
</footer>
</body>
</html>
