@extends('master')

@section('title', 'Welcome!')

@section('content')

    @if (isset($message))
        <div class="alert alert-info" role="alert">{{ $message }}</div>
    @else
        @if (empty($user))
            <div class="alert alert-primary" role="alert">Please log in!</div>
            <div class="row ">
                <div class="col-md-6">
                    <h3>Create new profile</h3>
                    <form action="/sign-up" method="post" enctype="multipart/form-data" class="text-left">
                        <div class="form-group">
                            <label for="inputEmail">Name</label>
                            <input name="name" type="text" class="form-control" id="inputEmail" placeholder="For example, John">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="For example, john@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Dont tell anyone this password">
                        </div>
                        <div class="form-group">
                            <label for="inputFile">Your photo</label>
                            <input name="picture" type="file" id=inputFile">
                            <p class="help-block">You can uplaod any .jpg image.</p>
                        </div>
                        <button type="submit" class="btn btn-success">Sign up</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3>Sign in</h3>
                    <form action="/sign-in" method="POST" class="text-left">
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="For example, john@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Your password on this site">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>
         @else
            <div class="alert alert-success" role="alert">Welcome home, {{ $user->name }}!</div>
            <div class="row">
                <div class="col-md-4">
                    <img src="/usercontent/avatas/{{ $user->id }}.jpg" alt="Avatar" style="height: 200px; width: auto;">
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endif
@endsection