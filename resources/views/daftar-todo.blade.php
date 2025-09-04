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
            </div>
            <div class="flex justify-end mt-4 gap-x-2">
                <button class="px-4 py-1 rounded-xl bg-white border border-gray-200">Batal</button>
                <button class="px-4 py-1 rounded-xl bg-blue-700 text-white border border-gray-200">Tambah</button>
            </div>
        </form>
    </div>

        <!-- Modal for delete confirmation -->
        <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm">
                <h3 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h3>
                <p class="mb-6">Apakah Anda yakin ingin menghapus todo ini?</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end gap-x-2">
                        <button type="button" id="cancelDelete" class="px-4 py-1 rounded-xl bg-white border border-gray-200">Batal</button>
                        <button type="submit" class="px-4 py-1 rounded-xl bg-red-600 text-white border border-gray-200">Hapus</button>
                    </div>
                </form>
            </div>
        </div>

        @push('scripts')
            
        <script>
            // Show modal and set form action
            function showDeleteModal(actionUrl) {
                document.getElementById('deleteModal').classList.remove('hidden');
                document.getElementById('deleteForm').action = actionUrl;
            }
            // Hide modal
            document.getElementById('cancelDelete').onclick = function() {
                document.getElementById('deleteModal').classList.add('hidden');
            };
            </script>
            @endpush
    </x-layout>
