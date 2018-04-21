<nav class="navbar navbar-default navbar-green">
    <div class="container">
        <div class="row">
        <span class="col-xs-1" style="font-size:30px;cursor:pointer;line-height: 50px;" onclick="openNav()">&#9776;</span>
        <div class="navbar-header col-xs-10 flex-row">
            <a class="navbar-brand" href="{{ url('/') }}">Asfina</a>
        </div>
        </div>
        
        @if(Auth::check())
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="{{ url('profile/'.Auth::user()->id) }}" class="flex-row">
                    <i class="fa fa-user col-xs-2">

                    </i>
                    <div class="col-xs-10">
                        Edit Profile
                    </div>
                </a>
                <a href="{{ url('/') }}" class="flex-row">
                    <i class="fa fa-money col-xs-2"></i> 

                    <div class="col-xs-10">
                        Allocations
                    </div>
                </a>
                <a href="{{ url('auth/logout') }}" class="flex-row">
                    <i class="fa fa-sign-out col-xs-2"></i> 
                    <div class="col-xs-10">
                        Logout
                    </div>
                </a>
            </div>
        @endif
        
    </div>
</nav>