<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="CSS/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>Login</h1>
        </header>
        <section class="login">
            <form action="sv_login.php" method="post">
                <input type="text" placeholder="username" name="username" autocomplete="username" required><br>
                <input type="password" placeholder="password" name="password" autocomplete="current-password" required><br>
                <button type="submit">login</button>
            </form>
        </section>
    </body>
</html>