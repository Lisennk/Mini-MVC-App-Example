<div class="alert alert-success" role="alert">Welcome home, {{ $user->name }}!</div>
<div class="jumbotron text-center">
    <img src="/usercontent/avatars/{{ $user->id }}.jpg" alt="Avatar" class="avatar">
    <div class="name">
        {{ $user->name }}
    </div>
    <div class="desc">
        Your email is {{ $user->email }} and i hope you like this site.
    </div>
    <div>
        <a href="/exit" class="btn btn-lg btn-danger">Log out</a>
    </div>
</div>