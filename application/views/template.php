<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Sky Betting &amp; Gaming Technical Test</title>

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    
    <form action="<?php echo base_url('home/update'); ?>" method="post">
        <table>
            <tr>
                <th>First name</th>
                <th>Last name</th>
            </tr>
            <?php foreach($people as $person): 
                $x = 0;
            ?>
            <tr>
                <td><input type="text" name="people[][firstname]" value="<?php echo $person[0]; // first name ?>" /></td>
                <td><input type="text" name="people[][surname]" value="<?php echo $person[1]; // surname ?>" /></td>
            </tr>
            <?php 
                $x++;
            endforeach; 
            ?>
        </table>
        <input type="submit" value="OK" />
    </form>
</body>

</html>