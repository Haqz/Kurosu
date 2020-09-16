@extends('body')
@section('title', 'Register')

@section('content')
<div class="two column row centered">
    <div class="sixteen wide mobile eight wide tablet four wide computer column">
        <h2 class="ui teal image header">
          <div class="content">
            Register your account
          </div>
        </h2>
        @if(count($errors)> 0)
            <div class="ui error message">
                <i class="close icon"></i>
                <div class="header">
                    There were some errors with logging in
                </div>
                <ul class="list">
                    @foreach($errors as $error)
                    <li>{{ $error }}</li>
                    @endforeach
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
                    <li>{{ $message }}</li>
                </ul>
            </div>
        @endif
        <form class="ui large form" method="POST" action="{{ route('auth.register.register') }}">
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
            <div class="field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="repeat-password" placeholder="Repeat password" required>
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="envelope icon"></i>
                <input type="text" name="email" placeholder="E-Mail" required>
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="gift icon"></i>
                <input type="text" name="beta-key" placeholder="Beta-Key" required>
              </div>
            </div>
            <input type="submit" class="ui fluid large teal submit button" value="Register" name="register">
          </div>
        </form>
      </div>
    <div class="sixteen wide mobile eight wide tablet four wide computer column">
        <h1 class="ui teal header"><i class="fa fa-key"></i> Beta Keys</h1>
        <table class="ui celled table" id="beta-keys">
            <thead>
            <tr>
                <th class="center aligned">Key</th>
                <th class="center aligned">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($items as $item)
                <tr class="@if($item->is_allowed) positive @else negative @endif" >
                    <td class="center aligned" data-label="Key">{{ $item->key }}</td>
                    <td class="center aligned" data-label="Status"><i class="fa @if($item->is_allowed) fa-check @else fa-exclamation @endif"></i></td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>

@endsection
@section('scripts')

@endsection
