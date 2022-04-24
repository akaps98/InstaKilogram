<?php
include('../../php/login-handler.php');
include('../css/auth/loginpage.css');
?>


<html>
<head>
    <title>Welcome to Bee Music!</title>
</head>
<body>

<div id="inputContainer">
    <form id="loginForm" action="login.php" method="POST">
        <h2 class="loginText">Login to your account</h2>
        <p>
            <label for="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. vgiabao2000" required>
        </p>
        <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" name="loginPassword" type="password" required>
        </p>

        <button type="submit" name="loginBtn">Login</button>

    </form>
</div>

</body>
</html>