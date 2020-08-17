<div class="ui inverted segment">
    <div class="ui inverted secondary stackable menu">
        <a class="item" href="{{route('index')}}">	Kurosu</a>
        @if(!Auth::check())
            <a class="item" href="{{route('auth.login.index')}}"><i class="fa fa-sign-in"></i>	Login</a>
            <a class="item" href="#"><i class="fa fa-plus-circle"></i>	Register</a>
            <a class="item" href="{{route('beta_keys.index')}}"><i class="fa fa-key"></i>	Beta keys</a>
        @endif
        <a class="item" href="index.php?p=2"><i class="fa fa-trophy"></i>	Leaderboard</a>
        <a class="item" href="index.php?p=2"><i class="fa fa-music"></i>	Beatmaps</a>
      <div class="ui dropdown item">
        <i class="fa fa-question-circle"></i>	Help & Info
        <i class="dropdown icon"></i>
        <div class="menu">
            <a class="item" href="index.php?p=23"><i class="fa fa-gavel"></i> Rules</a>
            <a class="item" href="index.php?p=14"><i class="fa fa-question-circle"></i>	Help</a>
            <a class="item" href="index.php?p=17"><i class="fa fa-code"></i> Changelog</a>
            <a class="item" href="blog/"><i class="fa fa-anchor"></i>	Blog</a>
            @if(Auth::check())
                <div class="divider"></div>
                <a class="item" href="index.php?p=27"><i class="fa fa-cogs"></i>	Server status</a>
                <a class="item" href="index.php?p=22&type=0"><i class="fa fa-bug"></i>Report a bug</a>
                <a class="item" href="index.php?p=22&type=1"><i class="fa fa-plus-circle"></i>Request a feature</a>
                <div class="divider"></div>
                <a class="item" href="https://mu.nyodev.xyz/upd.php?id=18"><i class="fa fa-server"></i>	Ripple Server switcher</a>
            @endif
            <div class="divider"></div>
            <a class="item" href="https://github.com/osuripple/ripple"><i class="fa fa-github"></i>	Github</a>
            <a class="item" href="https://discord.gg/0rJcZruIsA6rXuIx"><i class="fa fa-comment"></i>	Discord</a>
            <a class="item" href="index.php?p=21"><i class="fa fa-info-circle"></i>	About</a>
        </div>
    </div>
      <a class="item" href="index.php?p=2"><i class="fa fa-cog"></i>	<b>Admin Panel</b></a>
        @if(Auth::check())
            <div class="right menu">
                <div class="ui dropdown item">
                    <i class="fa fa-question-circle"></i> {{Auth::user()->username}}
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="index.php?u='.getUserID($_SESSION['username']).'"><i class="fa fa-user"></i> My profile</a>
                        <a class="item" href="index.php?p=26"><i class="fa fa-star"></i>	Friendlist</a>
                        <div class="divider"></div>
                        <a class="item" href="index.php?p=5"><i class="fa fa-picture-o"></i> Change avatar</a>
                        <a class="item" href="index.php?p=7"><i class="fa fa-lock"></i>	Change password</a>
                        <a class="item" href="index.php?p=8"><i class="fa fa-pencil"></i> Edit userpage 	<span class="label label-info">Beta</span></a>
                        <a class="item" href="index.php?p=6"><i class="fa fa-cog"></i>	User settings</a>
                        <a class="item" href="index.php?p=24"><i class="fa fa-paper-plane"></i>	My reports</a>
                        <a class="item" href="submit.php?action=forgetEveryCookie"><i class="fa fa-chain-broken"></i>	Delete all login tokens</a>
                        <div class="divider"></div>
                        <a class="item" href="{{route('auth.logout')}}"><i class="fa fa-sign-out"></i>	Logout</a>
                    </div>
                </div>
            </div>
        @endif

    </div>
  </div>
