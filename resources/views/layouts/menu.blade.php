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
    <li class="nav-item">
        <a href="{{ route('academic_title.all') }}"
           class="nav-link {{ Request::is('academic_title') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i>
            <p>Звания</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('academic_degree.all') }}"
           class="nav-link {{ Request::is('academic_degree') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i>
            <p>Ученые степени</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('attraction.all') }}" class="nav-link {{ Request::is('attraction') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i>
            <p>Условия привлечения</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('additional_type.all') }}"
           class="nav-link {{ Request::is('additional_type') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i>
            <p>Вид дополнительного образования</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('document_type.all') }}" class="nav-link {{ Request::is('document_type') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i>
            <p>Вид документа</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('add_ad.all') }}" class="nav-link {{ Request::is('add_ad') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i>
            <p>Дополнительное образование</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('preparation_level.all') }}"
           class="nav-link {{ Request::is('preparation_level') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i>
            <p>Уровни подготовки</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('aducation_level.all') }}"
           class="nav-link {{ Request::is('aducation_level') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i>
            <p>Уровни образования</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('preparation.all') }}"
           class="nav-link {{ Request::is('preparation') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i>
            <p>Направление подготовки</p>
        </a>
    </li>
</ul>
