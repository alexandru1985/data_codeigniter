<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Test</title>


    </head>
    <body>


        <?php echo form_open('test/form_submit'); ?>

        <?php echo validation_errors('<p>', '</p>'); ?>



        <p>Usename:<?php echo form_input('username', set_value('username')); ?></p>
        <p>Password:<?php echo form_password('password'); ?></p>

    <p><?php echo form_submit('submit', 'Create Account'); ?></p>

        <?php form_close(); ?> 
</body>
</html>