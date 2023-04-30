<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Animal::class);

        $animals = auth()->user()->animals;

        $animals = Animal::all();
        // $animals = Animal::paginate(10);
        return view('category.animal.index', ['animals' => $animals]);
    }
    public function create()
    {
        return view('category.animal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'number' => ['required'],
            'note' => ['required', 'max:255'],
        ]);

        $animal =  new Animal();
            $animal->user_id = Auth::user()->id;
            $animal->name = $request->name;
            $animal->number = $request->number;
            $animal->note = $request->note;

            $animal->save();

        return redirect()->route('admin.animal.index')->with('createMessage', 'Animal created successfully');
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        // $this->authorize('update', $animal); //Don't show the edit view if the policy is not met
        return view('category.animal.edit', ['animal' => $animal]);
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        $this->authorize('update', $animal); //show the edit view if the policy is not met but hide the logic

        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'number' => ['required'],
            'note' => ['required', 'max:255'],
        ]);
            $animal->user_id = Auth::user()->id;
            $animal->name = $request->name;
            $animal->number = $request->number;
            $animal->note = $request->note;

            $animal->update();

        return redirect()->route('admin.animal.index')->with('updateMessage', 'Animal updated successfully');
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);

        $this->authorize('update', $animal); //show the edit view if the policy is not met but hide the logic

        $animal->delete();

        return redirect()->route('admin.animal.index')->with('deleteMessage', 'Animal deleted successfully');
    }
}