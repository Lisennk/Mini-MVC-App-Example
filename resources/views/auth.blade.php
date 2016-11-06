<div class="well well-lg hello">
    {{ loc('Please, sign up or sign in to view your profile and make me happy') }}
    <a href="/lang" class="lang">Change language / Изменить язык</a>.
</div>
<div class="row">
    <div class="col-md-6">
        <h3>{{ loc('Create new profile') }}</h3>
        <form action="/sign-up" method="post" enctype="multipart/form-data" class="text-left">
            <div class="form-group">
                <label for="inputEmail">{{ loc('Name') }}</label>
                <input required name="name" type="text" class="form-control" id="inputEmail" placeholder="{{ loc('For example, John') }}">
            </div>
            <div class="form-group">
                <label for="inputEmail">{{ loc('Email address') }}</label>
                <input required name="email" type="email" class="form-control" id="inputEmail" placeholder="{{ loc('For example, john@gmail.com') }}">
            </div>
            <div class="form-group">
                <label for="inputPassword">{{ loc('Password') }}</label>
                <input required name="password" type="password" class="form-control" id="inputPassword" placeholder="{{ loc('Dont tell anyone this password') }}">
            </div>
            <div class="form-group">
                <label for="inputFile">{{ loc('Your photo') }}</label>
                <input required name="picture" type="file" id=inputFile">
                <p class="help-block">{{ loc('Upload picture in .jpg, .png or .gif') }}</p>
            </div>
            <button type="submit" class="btn btn-success">{{ loc('Sign up') }}</button>
        </form>
    </div>
    <div class="col-md-6">
        <h3>{{ loc('Sign in') }}</h3>
        <form action="/sign-in" method="POST" class="text-left">
            <div class="form-group">
                <label for="inputEmail">{{ loc('Email address') }}</label>
                <input required name="email" type="email" class="form-control" id="inputEmail" placeholder="{{ loc('For example, john@gmail.com') }}">
            </div>
            <div class="form-group">
                <label for="inputPassword">{{ loc('Password') }}</label>
                <input required name="password" type="password" class="form-control" id="inputPassword" placeholder="{{ loc('Your password on this site') }}">
            </div>
            <button type="submit" class="btn btn-primary">{{ loc('Sign in') }}</button>
        </form>
    </div>
</div>