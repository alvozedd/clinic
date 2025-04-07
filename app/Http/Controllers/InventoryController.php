<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the inventory items.
     */
    public function index()
    {
        $inventory = Inventory::all();
        return view('inventory.index', compact('inventory'));
    }

    /**
     * Show the form for creating a new inventory item.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created inventory item in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'reorder_level' => 'required|integer|min:0',
            'unit_price' => 'required|numeric|min:0',
        ]);

        // Create the inventory item
        Inventory::create($request->all());

        return redirect()->route('inventory.index')->with('success', 'Inventory item created successfully.');
    }

    /**
     * Display the specified inventory item.
     */
    public function show(Inventory $inventory)
    {
        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified inventory item.
     */
    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }

    /**
     * Update the specified inventory item in the database.
     */
    public function update(Request $request, Inventory $inventory)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'reorder_level' => 'required|integer|min:0',
            'unit_price' => 'required|numeric|min:0',
        ]);

        // Update the inventory item
        $inventory->update($request->all());

        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully.');
    }

    /**
     * Remove the specified inventory item from the database.
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index')->with('success', 'Inventory item deleted successfully.');
    }
}