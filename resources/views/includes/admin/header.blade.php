<header class="navbar navbar-dark bg-dark sticky-top flex-md-nowrap p-0">
    <h2 class="navbar-brand col-md-3 col-lg-5 px-3" href="#">
        <span> Admininstrator</span>
    </h2>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a href="#">
                <a href="#" class="nav-link px-3 bg-dark border-0"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </a>
        </div>
    </div>
</header>
