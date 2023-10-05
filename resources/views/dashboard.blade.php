<x-app-layout>
    <x-slot name="header">
        <a href="{{ route ('todos.create') }}"
            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow">
        new</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 1g:px-8 flex flex-row gap-3">
            @if($todos->count()>0)
                @foreach ($todos as $todo)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg basis-1/4">,
                        <div class="p-6 bg-white border-b border gray-200">
                            <h3 class="font-semibold text-xl text-gray-800 leading-tight">{{ $todo->title }}</h3>
                            <p>{{ $todo->body }}</p>
                            <p class="mt-4 text-xs">Added at: {{ $todo->created_at->format ('d/m/Y H:i:s') }}</p>
                            @if($todo->isDone())
                                <p class="mt-4 text-xs">Done at: {{ $todo->deleted_at->format ('d/m/Y H:i:s') }}</p>
                            @endif
                        </div>
                        @if(!$todo->isDone())
                            <div class="md:grid md:grid-cols-1 sm:px-2 lg:px-6 sm:my-2 lg:my-4">
                                <div class="md:col-span-1">
                                    <a href="{{ route('todos.edit', ['todo' => $todo->getkey()]) }}" 
                                        class="inline-flex justify-center rounded-md border border-transparent bg-orange-400 py-2 px-4 text-sm">Edit</a>
                                    <a href= "{{ route('todos.done', ['todo' => $todo->getkey()]) }}"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text -sm">Done</a>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>