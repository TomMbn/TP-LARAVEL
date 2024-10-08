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
}
