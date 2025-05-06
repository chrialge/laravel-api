<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ChriPortfolio') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- remixicon 4.2.0 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
        integrity='sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    @yield('script')
</head>

<body>
    <div id="app" class="admin_layout">

        <nav id="sidebar">
            <ul>

                <li>
                    <img class="logo" src="{{ asset('logo/logo_chrialge_bianco.png') }}" alt="">
                    <button class="toggle_btn">
                        <i class="ri-arrow-right-double-fill"></i>
                    </button>
                </li>

                <li class="active">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa-solid fa-table-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <button class="dropdown_btn">
                        <i class="fa-solid fa-folder-plus"></i>
                        <span>Crea</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>

                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('admin.projects.create') }}">
                                Progetto
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.technologies.create') }}">
                                Tecnlogia
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.types.create') }}">
                                Tipologia
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.collaborators.create') }}">
                                Collaboratore
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.notes.create') }}">
                                Nota
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <button class="dropdown_btn">
                        <i class="ri-todo-fill"></i>
                        <span>Tabelle</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>

                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('admin.projects.index') }}">
                                Progetto
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.technologies.index') }}">
                                Tecnlogia
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.types.index') }}">
                                Tipologia
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.collaborators.index') }}">
                                Collaboratore
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.notes.index') }}">
                                Nota
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('profile.edit') }}">
                        <i class="fa-solid fa-user-gear"></i>
                        <span>Profilo</span>
                    </a>
                </li>

                <li>
                    {{-- se clicco scollega l'utente --}}
                    <a class="sidebar__link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="ri-logout-box-r-fill"></i>
                        <span>Log Out</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>




        <main class="content_page">
            @yield('content')
        </main>
    </div>
</body>

</html>
