<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <h3 class="login-container-title">Login</h3>

    <form class="form-container" onsubmit="login(event)">
        <label for="username">Username :</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Enter Your Username">
        <label for="password">Password : </label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password">

        <button class="button">Log In</button>
        <button class="button">Reset</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function login(){
        event.preventDefault();

        const username = document.getElementById("username").value.trim();
        const password = document.getElementById("password").value.trim();

        if (username === "" || password === ""){
            Swal.fire({
                icon: "error",
                title: "Error...",
                text: "Please Fill Username and Password",
            });
            return;
        }

        const correct_username = "Admin";
        const correct_password = "Admin@2026";

        if (username === correct_username && password === correct_password){
            Swal.fire({
                title: "Login Successfully!",
                icon: "success",
                draggable: true
            }).then(()=> {
                window.location.href = "crud.php";
            })
        } else {
            Swal.fire({
                icon: "error",
                title: "Error...",
                text: "Invalid Username or Password",
            });
        }
    }
</script>

</body>
</html>
