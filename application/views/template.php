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
    
    <form>
        <table>
            <tr>
                <th>First name</th>
                <th>Last name</th>
            </tr>
            <?php foreach($people as $person): ?>
            <tr>
                <td><input type="text" name="people[][firstname]" value="<?php echo $person[0]; ?>" /></td>
                <td><input type="text" name="people[][surname]" value="<?php echo $person[1]; ?>" /></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <input type="submit" value="OK" />
    </form>
</body>

</html>