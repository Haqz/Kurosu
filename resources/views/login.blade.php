@extends('body')
@section('title', 'Login')

@section('content')
<div class="sixteen wide mobile eight wide tablet four wide computer centered  column">
    <div class="column">
        <h2 class="ui teal image header">
          <div class="content">
            Log-in to your account
          </div>
        </h2>
        @if(count($errors)> 0)
            <div class="ui error message">
                <i class="close icon"></i>
                <div class="header">
                    There were some errors with logging in
                </div>
                <ul class="list">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    @if($error)
                        <li>{{$error}}</li>
                    @endif
                </ul>
            </div>
        @endif
        @if($message = Session::get('error'))
            <div class="ui error message">
                <i class="close icon"></i>
                <div class="header">
                    There were some errors with logging in
                </div>
                <ul class="list">
                    <li>{{$message}}</li>
                </ul>
            </div>
        @endif
        <form class="ui large form" method="POST" action="{{route('auth.login.login')}}">
            @csrf
          <div class="ui stacked segment">
            <div class="field">
              <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="username" placeholder="Username" required>
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="Password" required>
              </div>
            </div>
            <input type="submit" class="ui fluid large teal submit button" value="Login" name="login">
          </div>

          <div class="ui error message"></div>

        </form>

        <div class="ui message">
          New to us? <a href="#">Sign Up</a>
        </div>
      </div>
</div>

@endsection
@section('scripts')

@endsection
