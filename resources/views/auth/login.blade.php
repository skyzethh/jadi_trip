<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}" />

    <title>Form Login</title>
</head>

<body>

    <div class="wrapper wrapper2">
        <form action="">
            <h1>Welcome Back</h1>

            <div class="input-box2">
                <div class="input-field2">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-field2">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

            </div>
            <label>
                <input type="checkbox">Saya menyatakan bahwa informasi yang diberikan di atas adalah benar dan tepat
            </label>

            <button type="submit" class="btn"><a href="/verifikasi">Login</a></button>
            <a href="/register" class="btn2 btn3">Tidak punya akun? Daftar disini</a>
        </form>
    </div>

</body>

</html>
