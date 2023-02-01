
<!doctype html>
<html class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('output.css') }}" rel="stylesheet">
  @yield('css')

</head>
<body class="bg-gradient-to-tr from-secondary to-primary min-h-screen">
    <!-- Navbar start -->
    <header class="bg-transparent flex top-0 left-0 w-full absolute items-center z-[999] transition-all duration-500 ease-in-out ">
        <div class="container">
          <div class="flex items-center justify-between relative">
            <div class="px-5">
              <a href="/" class="flex ">
                <img src="{{asset('img/Logo.png')}}" class="h-14 lg:h-16 my-5" alt="Logo" >
                {{-- <span class="self-center text-2xl lg:text-3xl font-bold text-lime-700 ">Welove</span> --}}
              </a>  
            </div>  
            <div class="flex items-center px-5">
              <button id="menu" name="menu" type="button" class="block absolute right-5 lg:hidden">
                <span class="menu-line transition duration-300 ease-in-out origin-top-left"></span>
                <span class="menu-line transition duration-300 ease-in-out"></span>
                <span class="menu-line transition duration-300 ease-in-out origin-bottom-left"></span>
              </button>  
  
              <nav id="nav-menu" class="hidden bg-gradient-to-tr from-secondary to-primary  absolute py-5 lg:from-transparent lg:to-transparent  shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                <ul class="block lg:flex">
                  <li class="group">
                    <a href="/voucher" class="text-base text-white py-2 mx-8 flex group-hover:text-button transition ease-in-out duration-500">Voucher</a>
                  </li>  
                  <li class="group">
                    <a href="/chart" class="text-base text-white py-2 mx-8 flex group-hover:text-button transition ease-in-out duration-500">Chart</a>
                  </li>   
                  <li class="group">
                    <a href="/finalis" class="text-base text-white py-2 mx-8 flex group-hover:text-button transition ease-in-out duration-500">Finalis</a>
                  </li>   
                    
                </ul>  
              </nav>  
            </div>  
          </div>  
        </div>  
      </header>  
      <!-- Navbar end -->
      @yield('section')


      {{-- <script src={{ asset('/resources/js/script.js') }}></script> --}}
      <script src="{{ asset('js/script.js') }}"></script>
      @yield('java')
  
</body>
</html>
