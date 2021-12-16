
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Search Crypto Coin</title>

    <link rel="preconnect" href="https://api.blockchair.com">

    <link href="https://loutre.blockchair.io/assets/css/app.css?_nocache=e7cd5a20425721872b90ffeca795d66d" rel="stylesheet" id="app.css" nonce="3UiwFvSr7ad2VG9IspuhO4L5aBc7rfyB">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">Search Crypto Coin</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active" aria-current="page" href="/">Home</a>
        @if (Auth::user() == null)
            <a class="nav-link" href="/login">Login</a>
            <a class="nav-link" href="/register">Register</a>
        @else
        <div class="dropdown">

                <a class="btn dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{-- {{ dd(Auth::user()) }} --}}
                    <img src="{{ Storage::url(Auth::user()->image) }}" width="20" alt="{{ Auth::user()->image }}">
                    {{-- <img width="100px" height="100px" src="{{ Storage::url($s->image)}}" alt=""> --}}
                </a>
                {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button> --}}
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li><a class="dropdown-item" href="/update">Change Image</a></li>
                    <li><button type="submit" class="dropdown-item" href="{{ route('logout') }}">Logout</button></li>
                  </form>
                </ul>
              </div>
        @endif
      </nav>
    </div>

  </header>



  <main class="px-3">

    <div class="container mt-4">
        @yield('content')
    </div>
  </main>

  <footer class="mt-auto text-white-50">
    <p>2021 &copy; Anthony Christoper 2301911590</p>
  </footer>
</div>



  </body>
</html>
