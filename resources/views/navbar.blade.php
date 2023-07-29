@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">KUANTA</a>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href='/team'>Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href='/logout'>Logout</a>
                </li>
            </ul>
            <span class="navbar-text me-2">
                ID anda {{Auth::user()->id}}
            </span>
        </div>
    </div>
</nav>
