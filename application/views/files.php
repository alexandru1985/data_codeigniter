<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Data</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"
        type = "text/javascript" charset= "utf-8"></script>

    </head>
    <body>  <div id="files">


        </div>
        <script type="text/javascript">

            $(document).ready(function() {
                var files = <?php echo json_encode($files); ?>;
                var file_tree = build_file_tree(files);
                file_tree.appendTo('#files');

                function build_file_tree(files) {
                    var tree = $('<ul>');
                    return tree;
                    for (x in files) {
                        if (typeof files[x] == "object") {
                            var span = $('<span>').html(x).append.To(
                                    $('<li>').appendTo(tree).addClass('folder')
                                    );
                            var subtree = build_file_tree(files[x]).hide();
                            span.after(subtree);
                            span.click(function() {
                                $(this).parent().find('ul:first').toggle();

                            });
                        } else {
                            $('<li>').html(files[x]).appendTo(tree).addClass('file');
                        }

                    }
                    return tree;
                }

            });
        </script>


    </body>
</html>