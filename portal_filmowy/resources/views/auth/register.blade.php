<form method="POST" action="/register">
    @csrf
    <input name="name" placeholder="Imię">
    <input name="email" placeholder="Email">
    <input type="password" name="password">
    <input type="password" name="password_confirmation">
    <button>Zarejestruj</button>
</form>