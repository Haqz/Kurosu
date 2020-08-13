<nav class="navbar navbar-expand-lg navbar-light bg-dark" role="navigation">
    <a class="navbar-brand text-primary" href="#">Kurosu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarMenu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active ">
                <a class="nav-link text-primary" href="index.php?p=2"><i class="fa fa-sign-in"></i>	Login</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-primary" href="index.php?p=3"><i class="fa fa-plus-circle"></i>	Sign up</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-primary" href="{{route('beta_keys.index')}}"><i class="fa fa-key"></i>	Beta keys</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="index.php?p=13"><i class="fa fa-trophy"></i>	Leaderboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="http://bloodcat.com/osu"><i class="fa fa-music"></i>	Beatmaps</a>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarMenuDropdown" class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" role="button">
                    <i class="fa fa-question-circle"></i>	Help & Info<span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarMenuDropdown">
                    <a class="dropdown-item" href="index.php?p=23"><i class="fa fa-gavel"></i> Rules</a>
                    <a class="dropdown-item" href="index.php?p=14"><i class="fa fa-question-circle"></i>	Help</a>
                    <a class="dropdown-item" href="index.php?p=17"><i class="fa fa-code"></i> Changelog</a>
                    <a class="dropdown-item" href="blog/"><i class="fa fa-anchor"></i>	Blog</a>
                    <a class="dropdown-item" href="index.php?p=27"><i class="fa fa-cogs"></i>	Server status</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?p=22&type=0"><i class="fa fa-bug"></i>Report a bug</a>
                    <a class="dropdown-item" href="index.php?p=22&type=1"><i class="fa fa-plus-circle"></i>Request a feature</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://mu.nyodev.xyz/upd.php?id=18"><i class="fa fa-server"></i>	Ripple Server switcher</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://github.com/osuripple/ripple"><i class="fa fa-github"></i>	Github</a>
                    <a class="dropdown-item" href="https://discord.gg/0rJcZruIsA6rXuIx"><i class="fa fa-comment"></i>	Discord</a>
                    <a class="dropdown-item" href="index.php?p=21"><i class="fa fa-info-circle"></i>	About</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-primary" href="index.php?p=100"><i class="fa fa-cog"></i>	<b>Admin Panel</b></a>
            </li>
        </ul>

        <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a id="navbarMenuUserDropdown" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">
                    <i class="fa fa-question-circle"></i> Haqz <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarMenuUserDropdown">
                    <a class="dropdown-item" href="index.php?u='.getUserID($_SESSION['username']).'"><i class="fa fa-user"></i> My profile</a>
                    <a class="dropdown-item" href="index.php?p=26"><i class="fa fa-star"></i>	Friendlist</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?p=5"><i class="fa fa-picture-o"></i> Change avatar</a>
                    <a class="dropdown-item" href="index.php?p=7"><i class="fa fa-lock"></i>	Change password</a>
                    <a class="dropdown-item" href="index.php?p=8"><i class="fa fa-pencil"></i> Edit userpage 	<span class="label label-info">Beta</span></a>
                    <a class="dropdown-item" href="index.php?p=6"><i class="fa fa-cog"></i>	User settings</a>
                    <a class="dropdown-item" href="index.php?p=24"><i class="fa fa-paper-plane"></i>	My reports</a>
                    <a class="dropdown-item" href="submit.php?action=forgetEveryCookie"><i class="fa fa-chain-broken"></i>	Delete all login tokens</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="submit.php?action=logout"><i class="fa fa-sign-out"></i>	Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
