<div class="alert alert-success" role="alert">
    {{ loc('Welcome home') }}, {{ $user->name }}!
    <a href="/lang" class="lang">Change language / Изменить язык</a>
</div>
<div class="jumbotron text-center">
    <img src="/usercontent/avatars/{{ $user->id }}.jpg" alt="Avatar" class="avatar">
    <div class="name">
        {{ $user->name }}
    </div>
    <div class="desc">
        {{ loc('Your email is') }} {{ $user->email }} {{ loc('and i hope you like this site') }}.
    </div>
    <div>
        <a href="/exit" class="btn btn-lg btn-danger">{{ loc('Log out') }}</a>
    </div>
</div>