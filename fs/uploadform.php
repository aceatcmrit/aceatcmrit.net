<html>
  <body>
    <form id="upload-form" action="upload.php" enctype="multipart/form-data" method="post">
    <pre>
   	  <label>File:</label>      <input id="up" name="uploaded" type="file" /><br />
      <label>Title:</label>     <input id="ti" name="title" type="text" /><br />
      <label>Author:</label>    <input id="na" name="author" type="text" /><br />
      <label>Uploader:</label>  <input id="ud" name="uploader" type="text" /><br />
      <label>Tags:</label>      <input id="ta" name="tags" type="text" /><br />
    </form>
    </pre>
      <button onclick="validate()">Upload</button>
    <script type="text/javascript">
      function validate()
      {
        if( !document.getElementById('up').value ||
            !document.getElementById('ti').value ||
            !document.getElementById('na').value ||
            !document.getElementById('ud').value ||
            !document.getElementById('ta').value
        )
          {
            alert('Please enter all data...');
            return;
          }
        else
          document.getElementById('upload-form').submit();
      }
    </script>
  </body>
</html>
