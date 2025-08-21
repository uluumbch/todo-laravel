<x-layout title="Daftar Todo">
    <div class="mx-auto w-full">


        <h2 class="mb-2 text-center text-lg font-semibold text-gray-900 ">
            Your task management app

        </h2>
        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside mx-auto">
            @foreach ($todos as $todo)
                <x-item-list :todo="$todo" />
            @endforeach
        </ul>
        <form class="max-w-[40rem] mx-auto" action="{{ route('todo.store') }}" method="POST">
            @csrf
            <div class="border border-gray-300 rounded">
                <input type="search" id="default-search" name="name"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 rounded-lg bg-white outline-0 "
                    placeholder="tulis nama todo..." />

                <input type="search" id="default-search" name="desciprtion"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 rounded-lg bg-white outline-0 "
                    placeholder="opsional deskripsi..." />

                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 dark:bg-red-500 bg-blue-700  hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Tambah</button>
            </div>
            <div class="flex justify-end mt-4 gap-x-2">
                <button class="px-4 py-1 rounded-xl bg-white border border-gray-200">Batal</button>
                <button class="px-4 py-1 rounded-xl bg-blue-700 text-white border border-gray-200">Tambah</button>
            </div>
        </form>
    </div>
</x-layout>
