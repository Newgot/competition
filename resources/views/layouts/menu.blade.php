<!-- need to remove -->
<ul class="nav nav-menu">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Главная</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('p.all') }}" class="nav-link {{ Request::is('position') ? 'active' : '' }}">
            <i class="fas fa-industry"></i>
            <p>Должности</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('w.all') }}" class="nav-link {{ Request::is('worker') ? 'active' : '' }}">
            <i class="fas fa-male"></i>
            <p>Работники</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('c.all') }}" class="nav-link {{ Request::is('competence') ? 'active' : '' }}">
            <i class="fas fa-graduation-cap"></i>
            <p>Компетенции</p>
        </a>
    </li>    
</ul>