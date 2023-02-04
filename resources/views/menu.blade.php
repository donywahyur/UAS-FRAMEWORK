@php
    $link = request()->segment(1);
@endphp
<div class="app-menu">
    <ul class="accordion-menu">
        <li class="sidebar-title">
            Menu
        </li>
        <li class="{{ $link == 'dashboard' ? 'active-page' : '' }}">
            <a href="./dashboard" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
        </li>
    
        @if(Auth::user()->role_id == 1)
        <li class="{{ $link == 'pelanggan' ? 'active-page' : '' }}">
            <a href="./pelanggan" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">people</i>User</a>
        </li>
        <li class="{{ $link == 'tarif' ? 'active-page' : '' }}">
            <a href="./tarif" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">settings</i>Tarif</a>
        </li>
        @endif

        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
            <li class="{{ $link == 'pemakaian' ? 'active-page' : '' }}">
                <a href="./pemakaian" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">note</i>Pemakaian Meter Air</a>
            </li>
        @endif

        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
        <li class="{{ $link == 'laporan_bulanan' ? 'active-page' : '' }}">
            <a href="./laporan_bulanan" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">article</i>Laporan Bulanan</a>
        </li>
        @endif
    </ul>
</div>