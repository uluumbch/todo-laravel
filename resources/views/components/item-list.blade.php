<div>
    <li>
        {{ $todo->name }} - {{ $todo->is_done ? 'Selesai' : 'Belum selesai' }}
        <a href="/todo/{{ $todo->id }}/edit" class="text-blue-500 hover:text-blue-700">Edit</a>
        <form action="/todo/{{ $todo->id }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Yakin ingin menghapus?')" type="submit"
                class="text-red-500 hover:text-red-700">Hapus</button>
        </form>
        @if (!$todo->is_done)
            <form action="{{ route('todo.complete', $todo->id) }}" method="POST" class="inline">
                @csrf
                @method('PUT')
                <input type="hidden" name="is_done" value="1">
                <button onclick="return confirm('Yakin ingin selesai?')" type="submit"
                    class="text-green-500 hover:text-green-700">Selesai</button>
            </form>
        @endif
    </li>
</div>
