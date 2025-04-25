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
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    @yield('script')
</head>

<body>
    <div id="app">

        <div class="siderbar">
            <div class="logo_content">
                <div class="logo">
                    <img src="{{ asset('logo/logo_chrialge_bianco.png') }}" alt="">
                </div>
                <i class="ri-menu-line" id="btn_siderbar"></i>
            </div>

            <ul class="nav_list">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="ri-function-line"></i>
                        <span class="links_name">
                            Dashboard
                        </span>
                    </a>
                    <span class="tooltip_nav_list">Dashboard</span>
                </li>
                <li>
                    <a href="{{ route('admin.projects.index') }}">
                        <i class="ri-archive-2-fill"></i>
                        <span class="links_name">
                            Progetti
                        </span>
                    </a>
                    <span class="tooltip_nav_list">Progetti</span>
                </li>
                <li>
                    <a href="{{ route('admin.technologies.index') }}">
                        <i class="ri-code-s-slash-line"></i>
                        <span class="links_name">
                            Tecnologie
                        </span>
                    </a>
                    <span class="tooltip_nav_list">Tecnologie</span>
                </li>
                <li>
                    <a href="{{ route('admin.types.index') }}">
                        <i class="ri-stack-line"></i>
                        <span class="links_name">
                            Tipologie
                        </span>
                    </a>
                    <span class="tooltip_nav_list">Tipologie</span>
                </li>
                <li>
                    <a href="{{ route('admin.collaborators.index') }}">
                        <i class="ri-group-2-fill"></i>
                        <span class="links_name">
                            Collaboratori
                        </span>
                    </a>
                    <span class="tooltip_nav_list">Collaboratori</span>
                </li>

                <li>
                    <a href="{{ route('admin.notes.index') }}">
                        <i class="ri-sticky-note-fill"></i>
                        <span class="links_name">
                            Note
                        </span>
                    </a>
                    <span class="tooltip_nav_list">Note</span>
                </li>

                <li>
                    <a href="{{ route('profile.update') }}">
                        <i class="ri-user-settings-fill"></i>
                        <span class="links_name">
                            Profilo
                        </span>
                    </a>
                    <span class="tooltip_nav_list">Profilo</span>
                </li>
            </ul>

            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details">
                        <img src="{{ asset('profile.png') }}" alt="">
                        <div class="name_job">
                            <div class="name">Christian Algieri</div>
                            <div class="job">Web Developer</div>
                        </div>
                    </div>

                    {{-- se clicco scollega l'utente --}}
                    <a id="log_out" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="ri-logout-box-line" id="log_out"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


                </div>
            </div>


        </div>




        <main class="content_page">
            @yield('content')
        </main>
    </div>
</body>

</html>
