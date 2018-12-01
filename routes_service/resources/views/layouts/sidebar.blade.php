<header class="navbar navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header">
            
            <a class="navbar-brand mb-0 text-black" href="{{ url('/') }}">
                Uello    
            </a>
        </div>  
        <!-- Left Side Of Navbar -->
        
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav">
            <!-- Authentication Links -->
            @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Registrar</a></li>
            @else
            <li class="btn btn-danger btn-sm">
                
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="color: white;">
                            Sair
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </header>
