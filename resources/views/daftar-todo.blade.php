<x-layout title="Daftar Todo">
    <h1 class="text-green-600 ">Daftar TOdo</h1>


    <form class="max-w-md" action="/todo" method="POST">
        @csrf
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 stroke-green-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

            </div>
            <input type="search" id="default-search" name="name"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                placeholder="Tambah todo..." />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 dark:bg-red-500 bg-blue-700  hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Tambah</button>
        </div>
    </form>

    <h2 class="mb-2 text-lg font-semibold text-gray-900 ">
        Your task management app

    </h2>
    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside ">
        @foreach ($todos as $todo)
            <x-item-list :todo="$todo" />
        @endforeach
    </ul>
</x-layout>
