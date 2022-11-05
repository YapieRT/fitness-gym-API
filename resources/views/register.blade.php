<form class="register-form" action="{{ route('register.store') }}" method="post" >
    @csrf
    <input type="text" name="name">
    <input type="text" name="surname">
    <input type="text" name="phone_number">
    <input type="password" name="password">
    <input type="password" name="password_confirmation">
    <button type="submit" class="btn btn-primary btn-block">Зареєструватись</button>
</form>
