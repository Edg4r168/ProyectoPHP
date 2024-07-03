<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ESFE</title>
        <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/layout.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <section class="wrapper">
            <header>
                <div class="logo-container">
                    <h1>
                        <a class="navbar-brand ps-3" href="{{ route('home') }}">ESFE</a>
                    </h1>
                </div>

                <nav>
                    <button id="btn-deploySidebar" aria-label="Desplegar menú lateral">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="20px"
                            height="20px"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M4 6l16 0"></path>
                            <path d="M4 12l16 0"></path>
                            <path d="M4 18l16 0"></path>
                        </svg>
                    </button>

                    <div class="menu-container">
                        <input type="checkbox" id="input-toggleMenu" />
                        <label
                            class="deployMenu"
                            for="input-toggleMenu"
                            aria-label="Desplegar menú"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1519648023493-d82b5f8d7b8a?w=300"
                                alt="Avatar del usuario"
                            />

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24px"
                                height="24px"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon-config"
                            >
                                <path
                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"
                                ></path>
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                            </svg>
                        </label>

                        <ul id="profile-menu" class="menu">
                            @if(Auth::guard('docente')->check())
                            <li class="menu-item">
                                <a
                                    class="dropdown-item"
                                    href="{{ route('docentes.logout') }}"
                                    >Logout</a
                                >
                            </li>
                            @else
                            <li class="menu-item">
                                <a
                                    class="dropdown-item"
                                    href="{{ route('docentes.loginForm') }}"
                                    >Iniciar como docente</a
                                >
                            </li>
                            @endif @if(Auth::guard('estudiante')->check())
                            <li class="menu-item">
                                <a
                                    class="dropdown-item"
                                    href="{{ route('estudiantes.logout') }}"
                                    >Logout</a
                                >
                            </li>
                            @else
                            <li class="menu-item">
                                <a
                                    class="dropdown-item"
                                    href="{{ route('estudiantes.loginForm') }}"
                                    >Iniciar como estudiante</a
                                >
                            </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </header>

            <aside class="sideBar scroll">
                <nav>
                    @if(Auth::guard('docente')->check())
                        <ul>
                            <h4>Mantenimiento</h4>
                            <li>
                                <a class="nav-link" href="{{ route('docentes.index') }}">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-chart-area"></i>
                                    </div>

                                    <span>Docentes</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('grupos.index') }}">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-chart-area"></i>
                                    </div>

                                    <span>Grupos</span>
                                </a>
                            </li>
                            <li>
                                <a
                                    class="nav-link"
                                    href="{{ route('docentes_grupos.index') }}"
                                >
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-chart-area"></i>
                                    </div>

                                    <span>Grupos de docentes</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('estudiantes.index') }}">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-chart-area"></i>
                                    </div>

                                    <span>Estudiantes</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('asistencias.index') }}">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-chart-area"></i>
                                    </div>

                                    <span>Asistencia</span>
                                </a>
                            </li>
                            <li>
                                <a
                                    class="nav-link"
                                    href="{{ route('estudiantes_grupos.index') }}"
                                >
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-chart-area"></i>
                                    </div>

                                    <span>Grupos de estudiantes</span>
                                </a>
                            </li>
                        </ul>
                    
                    @elseif(Auth::guard('estudiante')->check())
                        <ul>
                            <h4>Asitencia</h4>

                            <li>
                                <a
                                    class="nav-link"
                                    href="{{ route('estudiantes.registrarAsistencia') }}"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20px"
                                        height="20px"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path
                                            d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"
                                        />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                    </svg>

                                    <span>Registrar asistencia</span>
                                </a>
                            </li>
                        </ul>
                    @endif
                </nav>
            </aside>

            <main>
                <div class="container-fluid px-4">@yield('content')</div>
            </main>
            <footer class="py-4 mt-auto">
                <div class="container-fluid px-4">
                    <div
                        class="d-flex align-items-center justify-content-between small"
                    >
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"
        ></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/index.js') }}"></script>
    </body>
</html>
