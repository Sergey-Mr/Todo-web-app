<x-app-layout>
    <x-slot name="header">
        <h2 class ="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create_todo') }}</h2>
    </x-slot>
    <div classs = "py-12">
        <div class="max-w-7xl ax-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg basis-1/4">
                {{--<form actions="{{ isset ($todo) ? route('todos.update') : route ('todos.store') }}" method= "POST">--}}
                <form action="{{ isset($todo) ? route('todos.update', ['todo' => $todo->id]) : route('todos.store') }}" method="POST">
                    @csrf
                    <div class="m:px-2 lg:px-6 sm:my-2 lg:my-4">
                        <label for="title" class="block text-se font-mediu text-gray-700">Title</labels>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input types="text" name="title" id="title"
                                class="block w-full rounded-md border-gray-300 pl-2 pr-2 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="{{ isset($todo) ? $todo->title : 'Title here' }}"> 
                        </div>
                    </div>
                    <div class="m:px-2 lg:px-6 sm:my-2 lg:my-4">
                        <label for="body" class="block text-sm font-medium text-gray-700">What todo? </label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <textarea name= "body" id="body" cols="30" rows="10"
                                class="block w-full rounded-md border-gray-300
                                focus:border-indigo-500 focus: indigo-500 focus:ring-indigo-500 sm:text-sm">
                                {{ isset($todo) ? $todo->body : null }}
                            </textarea>
                        </div>
                    </div>

                    <div class="md:grid md:grid-cols-1 sm:px-2 lg:px-6 sm:my-2 lg:my-4">
                        <div class="md:col-span-1">
                            <button type="submit"
                                class="intine-flex justify-center rounded-md border border-transparent {{ isset($todo) ? 'bg-orange-400' : 'bg-green-400'}} py-2 px-4 text-sm font-medium text-white shadow-sm ({ isset($todo) ? 'hover:bg-orange-500' : 'hover:bg-green-500' }} focus:outline-none">
                                {{ isset ($todo) ? 'Update' : 'Create' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>