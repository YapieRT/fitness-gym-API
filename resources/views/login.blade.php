<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('gym/public/assets/styles/auth.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@400;500&display=swap" rel="stylesheet">
    <title>Log in</title>
</head>
<body>
<header class="header">
    <div class="menuWrapper">
        <div class="menu">
            <div class="items">
                <div class="logo"></div>
                <div class="menuItems">
                    <h3 class="item">Тарифи</h3>
                    <h3 class="item">Про нас</h3>
                    <h3 class="item">Інфо</h3>
                    <h3 class="item">Новини</h3>
                </div>
            </div>
            <div class="user"><a href="#"><img src="{{ asset('gym/public/assets/img/user.png')}}" alt="Log In"></a></div>
        </div>

    </div>
</header>
    <section class="mainWrapper">
        <div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="authWrapper">
            <div class="title">
                <h1>Авторизація</h1>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="authInfo userTel">
                    <h2>Номер телефону:</h2>
                    <input type="tel" name="userTel">
                </div>
                <div class="authInfo userPass">
                    <h2>Пароль:</h2>
                    <input type="password" name="userPass">
                </div>
                <div class="rememberWrapper">
                    <label class="rememberTitle"><input type="checkbox" name="rememberMe" class="rememberCheckBox">Запам'ятати мене</label>
                </div>

                <div class="radioContainer">
                    <div class="checkRoleWrapper">
                        <label class="radioTitle"><input checked  type="radio" name="role" value="Client" class="radioRole">Клієнт</label>
                    </div>
                    <div class="checkRoleWrapper">
                        <label class="radioTitle"><input type="radio" name="role" value="Manager" class="radioRole">Менеджер</label>
                    </div>
                </div>


                <div class="submitBtn">
                    <input type="submit" name="LogIn" value="Увійти" class="logBtn">
                </div>
            </form>

        </div>
    </section>
    <footer class="footer">
    </footer>
</body>
</html>
