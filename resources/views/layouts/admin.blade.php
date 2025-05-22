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

        <nav id="sidebar" class="close">
            <ul>

                <li>
                    <img class="logo" src="{{ asset('logo/logo_chrialge_bianco.png') }}" alt="">
                    <button onclick="toggleSidebar()" id="toggle_btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#e3e3e3">
                            <path
                                d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z" />
                        </svg>
                    </button>
                </li>

                <li class="active">
                    <a class="page_route" href="{{ route('admin.dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#e3e3e3">
                            <path
                                d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <button class="dropdown_btn" onclick="toggleSubMenu(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#e3e3e3">
                            <path
                                d="M560-320h80v-80h80v-80h-80v-80h-80v80h-80v80h80v80ZM160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h240l80 80h320q33 0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Z" />
                        </svg>
                        <span>Crea</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#e3e3e3">
                            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                        </svg>
                    </button>

                    <ul class="sub-menu">
                        <div>
                            <li>
                                <a class="page_route" href="{{ route('admin.projects.create') }}">
                                    Progetto
                                </a>
                            </li>
                            <li>
                                <a class="page_route" href="{{ route('admin.collaborators.create') }}">
                                    Collaboratore
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li>
                    <button class="dropdown_btn" onclick="toggleSubMenu(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#e3e3e3">
                            <path
                                d="M360-240h440v-107H360v107ZM160-613h120v-107H160v107Zm0 187h120v-107H160v107Zm0 186h120v-107H160v107Zm200-186h440v-107H360v107Zm0-187h440v-107H360v107ZM160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Z" />
                        </svg>
                        <span>Tabelle</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#e3e3e3">
                            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                        </svg>
                    </button>

                    <ul class="sub-menu">
                        <div>
                            <li>
                                <a class="page_route" href="{{ route('admin.projects.index') }}">
                                    Progetto
                                </a>
                            </li>
                            <li>
                                <a class="page_route" href="{{ route('admin.technologies.index') }}">
                                    Tecnologia
                                </a>
                            </li>
                            <li>
                                <a class="page_route" href="{{ route('admin.types.index') }}">
                                    Tipologia
                                </a>
                            </li>
                            <li>
                                <a class="page_route" href="{{ route('admin.collaborators.index') }}">
                                    Collaboratore
                                </a>
                            </li>
                            <li>
                                <a class="page_route" href="{{ route('admin.notes.index') }}">
                                    Nota
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li>
                    <a class="page_route" href="{{ route('profile.edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#e3e3e3">
                            <path
                                d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z" />
                        </svg>
                        <span>Profilo</span>
                    </a>
                </li>

                <li>
                    {{-- se clicco scollega l'utente --}}
                    <a class="page_route" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#e3e3e3">
                            <path
                                d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                        </svg>
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

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>
