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
                <a href="{{ route('todo.edit', $todo->id) }}" class="text-blue-600">Edit</a>
            </span>
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
