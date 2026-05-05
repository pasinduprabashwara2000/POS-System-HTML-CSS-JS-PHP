<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: crud.php");
    exit;
}
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

        <button type="submit" class="button">Log In</button>
        <button type="reset" class="button">Reset</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function login(event){
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

        fetch("controller/LoginController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({
                action: "login",
                username: username,
                password: password
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    Swal.fire({
                        title: "Login Successfully!",
                        icon: "success",
                        draggable: true
                    }).then(()=> {
                        window.location.href = "crud.php";
                    });
                    return;
                }

                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: data.message || "Invalid Username or Password",
                });
            })
            .catch(() => {
                Swal.fire({
                    icon: "error",
                    title: "Error...",
                    text: "Login request failed",
                });
            });
    }
</script>

</body>
</html>
