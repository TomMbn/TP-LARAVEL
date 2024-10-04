<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Box;

class BoxController extends Controller
{
    public function index()
    {
        $boxes = Box::where('user_id', auth()->id())->get();

        return view('boxes.index', compact('boxes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Box::create([
            'user_id' => auth()->id(),
            'address' => $request->address,
            'city' => $request->city,
        ]);

        return redirect()->route('boxes.index')->with('success', 'Box created successfully!');
    }
    public function show(Box $box)
    {
        return view('boxes.show', compact('box'));
    }

    public function edit(Box $box)
    {
        return view('boxes.edit', compact('box'));
    }

    public function update(Request $request, Box $box)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $box->update($request->all());

        return redirect()->route('boxes.show', $box)->with('success', 'Box updated successfully');
    }

    public function destroy(Box $box)
    {
        $box->delete();

        return redirect()->route('boxes.index')->with('success', 'Box deleted successfully');
    }


}
