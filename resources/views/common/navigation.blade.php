<div>
    <nav class="navbar navbar-expand-lg">
        <a href="#" class="logo">LOGO</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('admin.dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Enrollments</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('admin.pendingPage')}}">Pending</a></li>
                    <li><a class="dropdown-item" href="{{route('admin.approvedPage')}}">Approved</a></li>
                    <li><a class="dropdown-item" href="{{route('admin.rejectedPage')}}">Rejected</a></li>
                </ul>
            </li>
        </ul>
      <div class="d-flex align-items-center gap-3">
            <span class="user">
                Hi, 
            </span>
            <form method="POST" action="">
                @csrf 
                <button class="btn logout-btn">Logout</button>
            </form>
        </div>
    </nav>
</div>