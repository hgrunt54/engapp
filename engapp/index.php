<?php
    $dsn ='mysql:host=localhost;dbname=centraladmin';
    $username = 'gb';
    $password = '12345';
    $db = new PDO($dsn, $username, $password);
    
    $cfrs = $db->query("SELECT cfrname FROM `dbo.cfr` ORDER BY cfrname ASC");
    
    if (!empty($_POST)){
        $cfrguids = $db->query("SELECT cfrguid FROM `dbo.cfr` WHERE cfrname = '{$_POST['cfrSel']}'");
    }
    else {
        $cfrguids = [];
    }
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>EngApp</title>
    </head>
    <body>
        <script>
            function results(){
                document.getElementById('result').style.display = 'block'
            }
        </script>
        <h1>Welcome to My Engagement Web API</h1>

            <form id="filter" method="POST">
                <p>Section of the app to select the CFR to grab binders from.</p>
                <label>CFR: </label>
                <select name='cfrSel'>
                    <?php foreach ($cfrs as $cfr) : ?>
                    <option value=<?php echo $cfr['cfrname'] ?>><?php echo $cfr['cfrname'] ?></option>
                    <?php endforeach ?>
                </select>
                <button type='submit'>'Go!'</button>
            </form>
            <?php if(!empty($cfrguids)): ?>
                <div id="result">
                    <?php foreach ($cfrguids as $guid) : ?>
                        <p>CFR GUID: <?php echo $guid['cfrguid'] ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
    </body>
</html>
