<footer class="bg-white rounded-lg shadow-sm dark:bg-gray-900 mx-4 mt-8 mb-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="{{asset ('storage/settings/01JQ48RS53CXD0G6XHZPHJMQNR.png')}}" alt="Лого сайта" class="size-8 rounded">
                <span class="text-2xl text-white font-bold">{{$setting->name}}</span>
            </a>
            <ul class="flex flex-wrap items-center gap-2 mb-6 text-[18px] font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li><a href="" class="hover:text-primary transition-colors duration-300">Главная</a></li>
                <li><a href="#" class="hover:text-primary transition-colors duration-300">Чему вы научитесь</a></li>
                <li><a href="#sect1" class="hover:text-primary transition-colors duration-300">Курсы</a></li>
                <li><a href="#reviews" class="hover:text-primary transition-colors duration-300">Отзывы</a></li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a href="{{url('/')}}" class="hover:underline">Courses™</a>. All Rights Reserved.</span>
    </div>
</footer>
