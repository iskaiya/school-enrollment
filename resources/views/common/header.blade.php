<header id="main-header">
    <div class="header-inner">

        <a href="/" class="logo-link">
            <img src="{{ asset('images/logo.jpg') }}" alt="University Logo" class="logo-img">
        </a>

        <nav class="nav-center">
            @if(request()->routeIs('admin.*'))
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'nav-active' : '' }}">Dashboard</a>

                <div class="nav-dropdown">
                    <button class="nav-dropdown-trigger" onclick="toggleNavDropdown(this)">
                        Enrollment
                        <svg class="chevron" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="nav-dropdown-menu">
                        <a href="{{ route('admin.pendingPage') }}" class="nav-dropdown-item">Pending</a>
                        <a href="{{ route('admin.approvedPage') }}" class="nav-dropdown-item">Approved</a>
                        <a href="{{ route('admin.rejectedPage') }}" class="nav-dropdown-item">Rejected</a>
                    </div>
                </div>
            @else
                <a href="/#about">About</a>
                <a href="/#contact">Contact Us</a>
                <a href="/#help">Help</a>
            @endif
        </nav>

        <div class="nav-right">
            @auth
                <div class="user-dropdown">
                    <button class="dropdown-trigger" onclick="toggleDropdown()">
                        <span class="user-greeting">Hi, {{ auth()->user()->name }}!</span>
                        <svg class="chevron" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="dropdown-menu" id="dropdownMenu">
                        <a href="{{ route('password.change') }}" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                            Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item dropdown-logout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="auth-buttons">
                    <a href="{{ route('register') }}" class="btn-outline">Register</a>
                    <a href="{{ route('login') }}" class="btn-solid">Log In</a>
                </div>
            @endauth
        </div>

    </div>
</header>

<style>
    #main-header {
        width: 100%;
        background-color: #ffffff;
        border-bottom: 1px solid #e8f0f7;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .header-inner {
        max-width: 1200px;
        margin: 0 auto;
        height: 70px;
        padding: 0 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2rem;
    }

    .logo-link {
        flex-shrink: 0;
        display: flex;
        align-items: center;
    }

    .logo-img {
        height: 44px;
        width: auto;
        object-fit: contain;
        display: block;
    }

    .nav-center {
        display: flex;
        align-items: center;
        gap: 2rem;
        flex: 1;
        justify-content: center;
    }

    .nav-center a {
        color: #4a7fa5;
        text-decoration: none;
        font-size: 15px;
        font-family: 'Trebuchet MS', Arial, sans-serif;
        font-weight: 500;
        letter-spacing: 0.01em;
        transition: color 0.2s ease;
        white-space: nowrap;
    }

    .nav-center a:hover {
        color: #007dc4;
    }

        .nav-active {
        color: #007dc4 !important;
        font-weight: 600;
    }

    .nav-dropdown {
        position: relative;
    }

    .nav-dropdown-trigger {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: none;
        border: none;
        outline: none;
        color: #4a7fa5;
        font-size: 15px;
        font-family: 'Trebuchet MS', Arial, sans-serif;
        font-weight: 500;
        cursor: pointer;
        transition: color 0.2s ease;
        padding: 0;
    }

    .nav-dropdown-trigger:hover {
        color: #007dc4;
    }

    .nav-dropdown-trigger.open .chevron {
        transform: rotate(180deg);
    }

    .nav-dropdown-menu {
        display: none;
        position: absolute;
        top: calc(100% + 12px);
        left: 50%;
        transform: translateX(-50%);
        background: #ffffff;
        border: 1px solid #e8f0f7;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0, 125, 196, 0.1);
        min-width: 140px;
        overflow: hidden;
        z-index: 200;
    }

    .nav-dropdown-menu.open {
        display: block;
    }

    .nav-dropdown-item {
        display: block;
        padding: 0.65rem 1rem;
        font-size: 14px;
        font-family: 'Trebuchet MS', Arial, sans-serif;
        color: #4a7fa5;
        text-decoration: none;
        transition: background 0.15s ease;
    }

    .nav-dropdown-item:hover {
        background-color: #f0f7fc;
        color: #007dc4;
    }

    .nav-right {
        flex-shrink: 0;
        display: flex;
        align-items: center;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .user-greeting {
        font-size: 14px;
        color: #4a7fa5;
        font-family: 'Trebuchet MS', Arial, sans-serif;
        white-space: nowrap;
    }

    .user-dropdown {
        position: relative;
    }

    .dropdown-trigger {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.5rem 1rem;
        background: transparent;
        border: none;
        color: #007dc4;
        font-size: 14px;
        font-family: 'Trebuchet MS', Arial, sans-serif;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .dropdown-trigger:hover {
        color: #005f9e;
    }

    .chevron {
        transition: transform 0.2s ease;
    }

    .dropdown-trigger.open .chevron {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: calc(100% + 8px);
        right: 0;
        background: #ffffff;
        border: 1px solid #e8f0f7;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0, 125, 196, 0.1);
        min-width: 180px;
        overflow: hidden;
        z-index: 200;
    }

    .dropdown-menu.open {
        display: block;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.65rem 1rem;
        font-size: 14px;
        font-family: 'Trebuchet MS', Arial, sans-serif;
        color: #4a7fa5;
        text-decoration: none;
        background: transparent;
        border: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        transition: background 0.15s ease;
    }

    .dropdown-item:hover {
        background-color: #f0f7fc;
        color: #007dc4;
    }

    .dropdown-logout {
        color: #c0392b;
    }

    .dropdown-logout:hover {
        background-color: #fdf0f0;
        color: #c0392b;
    }

    .dropdown-divider {
        height: 1px;
        background-color: #e8f0f7;
        margin: 2px 0;
    }

    .auth-buttons {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .btn-outline {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1.25rem;
        border: 1.5px solid #007dc4;
        border-radius: 10px;
        color: #007dc4;
        background: transparent;
        font-size: 14px;
        font-family: 'Trebuchet MS', Arial, sans-serif;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .btn-outline:hover {
        background-color: #007dc4;
        color: #ffffff;
    }

    .btn-solid {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1.25rem;
        border: 1.5px solid #007dc4;
        border-radius: 10px;
        color: #ffffff;
        background: #007dc4;
        font-size: 14px;
        font-family: 'Trebuchet MS', Arial, sans-serif;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .btn-solid:hover {
        background-color: #005f9e;
        border-color: #005f9e;
        color: #ffffff;
    }
</style>

<script>
    function toggleDropdown() {
        const menu = document.getElementById('dropdownMenu');
        const trigger = document.querySelector('.dropdown-trigger');
        menu.classList.toggle('open');
        trigger.classList.toggle('open');
    }

    document.addEventListener('click', function(e) {
        const dropdown = document.querySelector('.user-dropdown');
        if (dropdown && !dropdown.contains(e.target)) {
            document.getElementById('dropdownMenu')?.classList.remove('open');
            document.querySelector('.dropdown-trigger')?.classList.remove('open');
        }
    });

    function toggleNavDropdown(trigger) {
    const menu = trigger.nextElementSibling;
    menu.classList.toggle('open');
    trigger.classList.toggle('open');
}

document.addEventListener('click', function(e) {
    document.querySelectorAll('.nav-dropdown-trigger').forEach(trigger => {
        if (!trigger.parentElement.contains(e.target)) {
            trigger.nextElementSibling.classList.remove('open');
            trigger.classList.remove('open');
        }
    });
});
</script>