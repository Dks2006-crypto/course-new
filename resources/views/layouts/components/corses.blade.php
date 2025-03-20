@foreach ($courses as $course)
<div class=" text-white">
    <div class="">
        <a href="#"
            class="max-w-sm p-9 flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="flex items-center justify-between">
                <div class="">
                    <h4>/</h4>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{$course->name}}</h5>
                </div>
                <img src="{{ url ('storage', $course->image) }}" class="size-10" alt="">
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
