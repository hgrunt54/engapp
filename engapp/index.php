<?php
    $dsn ='mysql:host=localhost;dbname=centraladmin';
    $username = 'gb';
    $password = '12345';
    $db = new PDO($dsn, $username, $password);
    
    $cfrs = $db->query("SELECT cfrname FROM `dbo.cfr`");
    $cfr1guids = $db->query("SELECT cfrguid FROM `dbo.cfr`");
    
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

            <div id="filter">
                <p>Section of the app to select the CFR to grab binders from.</p>
                <label>CFR: </label>
                <select name='cfrSel' method='post'>
                    <?php foreach ($cfrs as $cfr) : ?>
                    <option value=<?php echo $cfr['cfrname'] ?>><?php echo $cfr['cfrname'] ?></option>
                    <?php endforeach ?>
                </select>
                <input type='button' onclick='results()' value='Go!'>
            </div>
        <div id="result" style="display: none;">
                <?php foreach ($cfr1guids as $cfrguid) : ?>
            <p>CFR GUID: <?php echo $cfrguid['cfrguid'] ?></p>
                <?php endforeach ?>
        </div>
    </body>
</html>
