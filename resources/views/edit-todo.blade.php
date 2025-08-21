<x-layout title="Edit Todo">
    <h1 class="text-green-600 ">Edit Todo</h1>
    <form class="max-w-md" action="{{ route('todo.edit', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="todo-name" class="mb-2 text-sm font-medium text-gray-900 sr-only">Todo Name</label>
        <input type="text" id="todo-name" name="name" value="{{ $todo->name }}"
            class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Edit todo..." required />
        <label for="todo-status" class="mt-4 mb-2 text-sm font-medium text-gray-900 sr-only">Status</label>
        <select id="todo-status" name="is_done"
            class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
            <option value="1" {{ $todo->is_done ? 'selected' : '' }}>Selesai</option>
            <option value="0" {{ !$todo->is_done ? 'selected' : '' }}>Belum selesai</option>
        </select>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 mt-2">Update</button>
    </form>
</x-layout>
