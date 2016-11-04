@extends('master')

@section('title', 'Welcome!')

@section('content')
    <div class="jumbotron text-center">
        <h2>Welcome to test job!</h2>
        <p class="lead">Glad to see you on this test page. Please sign up and i hope i'll pass :)</p>
    </div>
    <div class="row ">
        <div class="col-md-6">
            <h3>Create new profile</h3>
            <form action="/sign-up" method="POST" class="text-left">
                <div class="form-group">
                    <label for="inputEmail">Name</label>
                    <input type="text" class="form-control" id="inputEmail" placeholder="For example, John">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email address</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="For example, john@gmail.com">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Dont tell anyone this password">
                </div>
                <div class="form-group">
                    <label for="inputFile">Your photo</label>
                    <input type="file" id=inputFile">
                    <p class="help-block">You can uplaod any .jpg or .png image.</p>
                </div>
                <button type="submit" class="btn btn-success">Sign up</button>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign in</h3>
            <form action="/sign-in" method="POST" class="text-left">
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="For example, john@gmail.com">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Your password on this site">
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
@endsection