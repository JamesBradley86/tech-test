<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Sky Betting &amp; Gaming Technical Test</title>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" />
    
</head>

<body>
    
    <?php if(isset($notify)): ?>
    <p class="notify"><?php echo $notify; ?></p>
    <?php endif; ?>
    
    <form action="<?php echo base_url('home/update_all'); ?>" method="post">
        <table id="people">
            <tr>
                <th>First name</th>
                <th>Last name</th>
            </tr>
            <?php foreach($people as $person): ?>
            <tr>
                <td><input type="text" name="people[][firstname]" value="<?php echo $person[0]; // first name ?>" class="firstname" /></td>
                <td><input type="text" name="people[][surname]" value="<?php echo $person[1]; // surname ?>" class="surname" /></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <input type="submit" value="OK" />
    </form>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
    var TechTest = TechTest || {};
    TechTest.updateUrl = '<?php echo base_url('home/update_person'); ?>';    
    </script>
    <script src="<?php echo base_url('assets/js/techtest.js'); ?>"></script>
</body>

</html>