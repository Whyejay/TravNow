<?php
require_once 'php/check_logging.php';
?>

<!DOCTYPE>
<head>
    <meta name="robot" content="noindex">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap-markdown-editor.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/post.css">    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>

    <script src="js/bootstrap-markdown-editor.js"></script>

    <script>

        jQuery(document).ready(function ($) {

            $('#editor').markdownEditor({
                preview: true,
                imageUpload: true, // Activate the option
                uploadPath: 'upload.php',
                onPreview: function (content, callback) {
                    callback(marked(content));
                }
            });

        });

    </script>
</head>

<body>


<div class="container">
   

    <form id="form">
    <div class="form-group">
    <table>
    <tr>
    <td>
        <label style="margin-right:15px" id="label" for="formTextarea">Title</label></td>
         <td><input size="50" class="form-control" id="formTextarea" ></input>
</td>
    </tr>
         </table>
      </div>
                <textarea name="text" id="editor" class="editorcls"></textarea>
                      <button type="submit" style="margin-top:10px" class="btn btn-primary">Submit</button>
    </form>
</div>


</body>

</html>
