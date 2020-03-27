<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="/">RABPEDIA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/lihat-katalog">Katalog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/riwayat-pengajuan">Riwayat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/persetujuan">Persetujuan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/penambahan-katalog">Penambahan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pengajuan">Pengajuan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/penambahan-ditlog">Penambahan Ditlog</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <span class="nav-link">{{Auth::user()->name}}</span>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" id="logout">
                    @csrf
                    <a href="#" class="nav-link text-danger"
                        onclick="document.getElementById('logout').submit();">Logout</a>
                </form>
            </li>
        </ul>
    </div>
</nav>