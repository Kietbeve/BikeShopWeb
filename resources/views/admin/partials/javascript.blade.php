<!-- jQuery -->
<script src="{{ '../admin/bower_components/jquery/dist/jquery.min.js' }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ '../admin/bower_components/bootstrap/dist/js/bootstrap.min.js' }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ '../admin/bower_components/metisMenu/dist/metisMenu.min.js' }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ '../admin/dist/js/sb-admin-2.js' }}"></script>
<script>
    // Preview hình ảnh
    function previewImage(event) {
      const preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(event.target.files[0]);
      preview.classList.remove('d-none');
    }
  </script>