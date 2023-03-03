
<?php

$sql = new mysqli( ********* );

$ip = ip2long($_SERVER["REMOTE_ADDR"]);

if ($_POST["text"] != NULL) {
	$sql->query("INSERT INTO poasts ( post, branch, ip ) VALUES ( \"{$_POST['text']}\", {$_GET["b"]}, {$ip} )");
}

echo $sql->error;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="./style.css">
    <title>AMPHITHEATER</title>
</head>
<body>

    <!--
    <a class="right" href="#">trending</a>
    <a class="right" style="margin-top: 20px;" href="#">search</a>
    <a class="right" style="margin-top: 42px;" href="#">top</a>
    -->

    <main>

        <div class="write" style="background-color: rgb(17, 195, 195);height:111px;">
            <div class="write">
                <form method="post">
		    <textarea name="text" placeholder="say something..."></textarea>
		    <input type="submit" style="border:none;color:rgb(17, 195, 195);background-color:white;font-family:monospace;padding:0px 0px;margin:0px 0px;font-size:11px;width:100%;text-align:right;" value="poast">
	       </form>
            </div>
        </div>


	<?php

		$result = $sql->query("SELECT * FROM poasts WHERE branch = {$_GET["b"]} ORDER BY id DESC");

		while ( $row = $result->fetch_assoc() ) {?>
			<div class="poast-outline">
            		  <div class="poast-header">
			  anonymous | :<?php 
			    if ($row["branch"] == 1) {
				    echo "main";
			    }
		            else {
				   echo $row["branch"];
			    }
			  ?>
            		  </div>
            		  <div class="poast">
			  <p2><?php echo $row["post"] ?></p2>
            		  </div>
            		  <div class="poast-footer">
			  <p5>.<?php echo $row["id"] ?> | <?php echo $row["stamp"] ?></p5>
            		  </div>
        		</div>

		<?php }		

	?>























    </main>
    <div style="position:fixed;bottom:0;left:0;padding-left:10px;padding-bottom:10px;">
        <a href="http://qxynn.com/amphitheater/branch/?b=1" style="display:block;">:main</a>
        <a href="http://qxynn.com/amphitheater/branch/?b=2" style="display:block;">:dev</a>
        <a href="http://qxynn.com/amphitheater/branch/?b=3" style="display:block;">:music</a>
        <a href="http://qxynn.com/amphitheater/branch/?b=4" style="display:block;">:cc</a>
        <a href="http://qxynn.com/amphitheater/branch/?b=5" style="display:block;">:pol</a>
        <a href="http://qxynn.com/amphitheater/branch/?b=6" style="display:block;">:fit</a>
    </div>
    <p2 style="position:fixed;left:0;top:0;padding-left:10px;padding-top:10px;">amphithea___</p2>
    <p2 style="position:fixed;bottom:0;right:0;font-size:12;padding-bottom:10px;padding-right:15px;">:<?php echo $_GET["b"] ?></p2>
    <div style="text-align:center; margin-top: 500px;">
        <p2>amphithea___</p2>
    </div>
</body>
</html>
