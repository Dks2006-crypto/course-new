<section>
    <x-container>
        <div class="py-12">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($courses as $course)
                    <div class="swiper-slide text-white">
                        <div class="">
                            <a href="#"
                                class="max-w-sm p-9 flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                <div class="flex items-center justify-between">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$course->name}}</h5>
                                    {{-- <img src="{{ url ('storage/images/', $course->image) }}" class="size-10" alt=""> --}}
                                </div>
                                <p class="font-normal text-gray-700 dark:text-gray-400 py-4">{{$course->description}}</p>
                                <div class="flex justify-between items-center">
                                    <span class="px-3 py-1.5 border rounded-full">{{$course->price}} ₽</span>
                                    <span class="px-3 py-0.5 border rounded-full">{{$course->time}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </x-container>
</section>
