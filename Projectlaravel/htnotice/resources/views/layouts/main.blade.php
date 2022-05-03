<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!--fonte do google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" 
        rel="stylesheet">
        <!--css Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
         <!-- css da aplicação -->
    
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/script.js"></script>
        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
        <body>
         <header>
          <nav class="navbar navbar-expand-lg navbar-light">
           <div class= "collapse navbar-collapse" id="navbar">  
            <a href="/" class="navbar-brand">
             <img src="/img/htnotice_logo.svg" alt="HDC Noticias"> 
              </a>
               <ul class="navbar-nav">
                <li class="nav-item">
                 <a href="/" class="nav-link"> Notícias </a>   
                </li>
                <li class="nav-item">
                 <a href="/notices/create" class="nav-link"> Criar Notícias </a>   
                </li>
                @auth
                <li class="nav-item">
                 <a href="/dashboard" class="nav-link"> Minhas notícias </a>   
                </li>   
        <li class="nav-item-sair"> 
   <a href="{{ route('logout') }}"class="no-underline hover:underline"style="text-decoration:none"
     onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">{{ __('Sair') }}
   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
      {{ csrf_field() }}
   </a>
        </form>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                 <a href="/login" class="nav-link"> Entrar </a>   
                </li>
                <li class="nav-item">
                 <a href="/register" class="nav-link"> Cadastre-se </a>   
                </li>
                @endguest
               </ul>
              </div>
             </nav>
            </header>
        <main>
         <div class="container-fluid">
             <div class="row">
                @if(session('msg'))
                 <p class="msg">{{ session('msg') }}</p>
                @endif
                @yield('content') 
             </div>
         </div>
        </main>
        <footer>
            <p>HDC Notices &copy; 2022 </p>
        </footer>
        <script src ="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
