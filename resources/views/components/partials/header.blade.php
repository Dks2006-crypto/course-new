<header class="bg-white shadow-lg py-4 sticky top-0 z-50">
    <div class="container mx-auto flex items-center justify-between px-4">
        <!-- Logo -->
        <a href="#" class="flex items-center text-primary gap-2 hover:text-secondary">
            <img src="{{url ('storage', $setting->logo)}}" alt="Лого сайта" class="size-8 rounded">
            <span class="text-2xl font-bold">{{$setting->name}}</span>
        </a>

        <!-- Mobile Menu Button (Hidden on larger screens) -->
        <div class="md:hidden">
            <button id="menu-toggle"
                class="text-gray-800 hover:text-primary focus:outline-none transition-colors duration-300">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation (Hidden on smaller screens) -->
        <nav class="hidden md:block">
            <ul class="flex space-x-8">
                <li><a href="" class="hover:text-primary transition-colors duration-300">Главная</a></li>
                <li><a href="#" class="hover:text-primary transition-colors duration-300">Чему вы научитесь</a></li>
                <li class="group relative">
                    <a href="#" class="hover:text-primary transition-colors duration-300">Плюсы</a>
                    <!-- Dropdown Menu -->
                    <ul
                        class="absolute left-0 hidden group-hover:block bg-white shadow-md py-2 mt-1 rounded-md w-48 transition-all duration-300">
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Service 1</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Service 2</a></li>
                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Service 3</a></li>
                    </ul>
                </li>
                <li>
                    @if (Route::has('login'))
                        @auth
                                <a href="{{url('/dashboard')}}">Личный кабинет</a>
                            @else
                                <a href="{{route('login')}}">Войти</a>
                            @if (Route::has('register'))
                                <a href="{{route('register')}}">Зарегаться</a>
                            @endif
                        @endauth
                    @endif
                    <a href="{{ route('cart.index') }}">Корзина</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <nav id="mobile-menu"
        class="hidden md:hidden bg-gray-50 border-t border-gray-200 transition-height duration-300 ease-in-out">
        <ul class="px-4 py-2">
            <li><a href="{{route('reviews.index')}}" class="block py-2 hover:text-primary">Главная</a></li>
            <li><a href="#" class="block py-2 hover:text-primary">Чему вы научитесь</a></li>
            <li>
                <a href="#" id="services-dropdown-toggle" class="block py-2 hover:text-primary">Плюсы</a>
                <!-- Mobile Dropdown -->
                <ul id="services-dropdown" class="hidden pl-4">
                    <li><a href="#" class="block py-2 hover:text-primary">Service 1</a></li>
                    <li><a href="#" class="block py-2 hover:text-primary">Service 2</a></li>
                    <li><a href="#" class="block py-2 hover:text-primary">Service 3</a></li>
                </ul>
            </li>
            <li>
                @if (Route::has('login'))
                    @auth
                            <a href="{{url('/dashboard')}}">Личный кабинет</a>
                        @else
                            <a href="{{route('login')}}">Войти</a>
                        @if (Route::has('register'))
                            <a href="{{route('register')}}">Зарегаться</a>
                        @endif
                    @endauth
                @endif
            </li>
        </ul>
    </nav>
</header>
<script>
    // Toggle mobile menu
      const menuToggle = document.getElementById('menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');

      menuToggle.addEventListener('click', () => {
          mobileMenu.classList.toggle('hidden');
          if (!mobileMenu.classList.contains('hidden')) {
              mobileMenu.style.height = mobileMenu.scrollHeight + "px"; // Set height for transition
          } else {
              mobileMenu.style.height = "0";
          }
      });

      // Toggle mobile services dropdown
      const servicesDropdownToggle = document.getElementById('services-dropdown-toggle');
      const servicesDropdown = document.getElementById('services-dropdown');

      servicesDropdownToggle.addEventListener('click', () => {
          servicesDropdown.classList.toggle('hidden');
      });
</script>
