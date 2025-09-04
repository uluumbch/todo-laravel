    <li class="flex items-center gap-x-3  mt-4 border-b last:border-none border-gray-400">
        <div class="inline-flex items-center">
            <label class="flex items-center cursor-pointer relative">
                <input defaultChecked type="checkbox" @checked($todo->is_done)
                    class="peer h-6 w-6 cursor-pointer transition-all appearance-none rounded-full bg-slate-100 shadow hover:shadow-md border border-slate-300 checked:bg-slate-800 checked:border-slate-800"
                    data-idTodo="{{ $todo->id }}" />
                <span
                    class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                        stroke="currentColor" stroke-width="1">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
            </label>
        </div>
        <div>
            <h1 class="text-xl font-semibold text-gray-900">{{ $todo->name }}</h1>
            <p>deskripsi</p>
            <span class="inline-flex gap-x-0.5 @if ($todo->is_done) text-red-600 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>

                <p>
                    {{ $todo->created_at }}
                </p>
            </span>
        </div>
        {{-- edit button and delete button --}}
        <div class="ml-auto flex items-center gap-x-1">
            {{-- edit button --}}
            <a href="{{ route('todo.edit', $todo->id) }}" class="px-3 py-1 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
            </a>
            {{-- delete button --}}
            <button type="button" class="px-3 py-1 "
                onclick="showDeleteModal('{{ route('todo.destroy', $todo->id) }}')">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </button>
        </div>
    </li>
    @once
        @push('scripts')
            <script>
                const checkboxes = document.querySelectorAll('input[type="checkbox"]');

                checkboxes.forEach(element => {
                    element.addEventListener('click', function(e) {
                        e.preventDefault();

                        let todoId = this.getAttribute('data-idtodo');
                        let isChecked = this.checked;

                        if (confirm("Are you sure you want to mark this task as completed?")) {
                            sendComplete(todoId, isChecked ? 1 : 0, this);
                        }
                    });
                });

                function sendComplete(todoId, isDone, checkbox) {
                    fetch(`/todo/${todoId}/done`, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                is_done: isDone
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Request failed');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Success:', data);
                            checkbox.checked = isDone === 1; // reflect the confirmed state
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            checkbox.checked = !checkbox.checked; // revert if request failed
                        });
                }
            </script>
        @endpush
    @endonce
