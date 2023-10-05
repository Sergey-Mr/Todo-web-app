<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\TodoItem;
use App\Http\Requests\CreateTodoRequest;

class TodoController extends Controller
{
    public function index(): View
    {
        $todos = auth()->user()->todos;
        return view('dashboard', compact('todos'));
    }

    public function create(): View
    {
        return view('components.form');

    }

    public function store(CreateTodoRequest $request): RedirectResponse
    {
        TodoItem::create([
            'title'=> $request->get('title'),
            'body'=> $request->get('body'),
            'user_id' => auth()->user()->getKey(),
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(TodoItem $todo)
    {
        return view('components.form', compact('todo'));
    }

    public function update(TodoItem $todo, CreateTodoRequest $request): RedirectResponse
    {
        $todo -> update($request->all());
        return redirect()->route('dashboard');
    }

    public function done(TodoItem $todo): RedirectResponse
    {
        $todo -> delete();

        return redirect()->route('dashboard');
    }

}

