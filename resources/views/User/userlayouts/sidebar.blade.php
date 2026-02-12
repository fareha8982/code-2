<a href="{{ route('user.profile') }}" class="brand-link">
    <img src="{{ asset('userprofiles/userprofile.jpg') }}"
         alt="Profile"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">

    <span class="brand-text font-weight-light">
        {{ Auth::user()->name }}
    </span>
</a>


<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
        <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#competitionModal">
                        <i class="nav-icon fas fa-trophy"></i>
                        <p>Competition</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link" data-toggle="modal" data-target="#quizModal">
                        <i class="nav-icon fas fa-question"></i>
                        <p>Quiz</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('read-books') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Self Read Books</p>
                    </a>
                </li>
        </ul>
    </nav>
</div>

