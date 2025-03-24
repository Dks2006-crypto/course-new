@foreach ($courses as $course)
@php
    $skidka = $course->price - ($course->price * ($course->discount / 100))
@endphp
<div class="text-white">
    <div class="">
        <a href="#"
            class=" relative max-w-sm px-9 pb-2 text-black flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100">
            <div class="flex flex-col pt-3">
                <div class="flex items-center justify-around py-1 px-1 border rounded-xl">
                    @if ($course->discount > 0)
                        <span class="p-1 lg:text-[18px] sm:text-[16px] text-[14px] text-red-500">Скидка {{$course->discount}}%</span>
                    @endif
                    @if (($course->is_new === 1))
                        <span class="p-1 lg:text-[18px] sm:text-[16px] text-[14px] text-blue-700 rounded-full">Новый</span>
                    @endif
                    @if ($course->is_popular === 1)
                        <span class="p-1 lg:text-[18px] sm:text-[16px] text-[14px] text-amber-500 rounded-full">Популярный</span>
                    @endif
                </div>
                <div class="flex items-center justify-between pt-1">
                    <div class="">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{$course->name}}</h5>
                    </div>
                    <img src="{{ url ('storage', $course->image) }}" class="size-10" alt="">
                </div>
            </div>
            <p class="font-normal text-gray-700 py-4">{{Str::limit($course->description, 23, ('...'))}}</p>
            <div class="flex justify-between items-center">
                @if ($course->discount > 0)
                    <div class="">
                        <span class="px-3 py-1.5 line-through">{{$course->price}} ₽</span>
                        <br>
                        <span class="px-3 py-1.5 text-2xl text-amber-600">/{{$skidka}} ₽</span>
                    </div>
                @else
                    <span class="px-3 py-1.5">{{$course->price}} ₽</span>
                @endif
                <span class="px-3 py-0.5 border rounded-full">{{$course->time}} часов</span>
            </div>
            <form class="pt-3 flex items-center justify-center" action="{{ route('cart.add', $course) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary my-auto px-6 py-2 cursor-pointer bg-blue-700 rounded-full text-white">Добавить в корзину</button>
            </form>
        </a>
    </div>
</div>
@endforeach
