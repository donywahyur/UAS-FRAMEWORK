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
            <a href="./pelanggan" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Pelanggan</a>
        </li>
        <li class="{{ $link == 'tarif' ? 'active-page' : '' }}">
            <a href="./tarif" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Tarif</a>
        </li>
        @endif

        <li class="{{ $link == 'pemakaian' ? 'active-page' : '' }}">
            <a href="./tarif" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Pemakaian Meter Air</a>
        </li>

        @if(Auth::user()->role_id == 1)
        <li class="{{ $link == '' ? 'active-page' : '' }}">
            <a href="./tarif" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Laporan Bulanan</a>
        </li>
        @endif
    </ul>
</div>