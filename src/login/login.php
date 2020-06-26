<?php
	require_once("../connention.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/w3.css">
    <script src="login.js"></script>
    <title>SQL Injection</title>
</head>

<body class="w3-padding-48">
    <?php
			if(isset($_POST['email']) && isset($_POST['password']))
			{
                $email=$_POST['email'];
                $pass=$_POST['password'];
				$rows = $db->query("SELECT * FROM users WHERE Email LIKE '$email' AND Password LIKE '$pass'");
				if($rows)
				{
					if($rows->rowCount()>0){
                        header("Location: http://localhost/dashboard/dashboard.html"); 
                    }
                    else{
                        echo "<script>alert('Invalid Email or Password');</script>";
                    }
				}
				else
				{
					echo "<script>alert('Invalid Email or Password');</script>";
				}
			}
		?>
    <div class="w3-display-container w3-margin-bottom" style="height:30vh;">
        <div class="w3-display-container w3-display-middle">
            <img src="../logo.png" class="w3-round" alt="Logo" style="width:35vw;">
        </div>
    </div>
    <div class="w3-display-container" style="height:35vh;">
        <div class="w3-display-middle">
            <form id="form" class="w3-container" style="width:25vw" method="post">
                <label class="w3-text-green" for="email"><b>Email</b></label>
                <input name="email" id="email" class="w3-input w3-round w3-margin-bottom w3-border-green" type="text" />

                <label class="w3-text-green" for="password"><b>Password</b></label>
                <input name="password" id="password" class="w3-input w3-round w3-margin-bottom w3-border-green"
                    type="password" />

                <button class="w3-btn w3-green w3-round-large w3-block" style="margin-top:6vh">LOGIN</button>
            </form>
        </div>
    </div>
</body>

</html>