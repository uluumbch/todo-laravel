<div>
    <li class="flex items-center gap-x-3 border-b-2 border-gray-300 mt-4">
        <div class="">
            <input checked id="red-checkbox" type="checkbox" value=""
                class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded-full focus:ring-red-500   focus:ring-2 ">
        </div>
        <div>
            <h1 class="text-xl font-semibold text-gray-900">{{ $todo->name }}</h1>
            <p>deskripsi</p>
            <span class="inline-flex gap-x-0.5 @if($todo->is_done) text-red-600 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>

                <p>
                    {{ $todo->created_at }}
                </p>
                <a href="{{ route('todo.edit', $todo->id) }}" class="text-blue-600">Edit</a>
            </span>
        </div>
    </li>
</div>
