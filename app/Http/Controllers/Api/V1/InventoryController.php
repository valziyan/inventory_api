<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // List all inventories for the logged-in user
        $inventories = Inventory::where('user_id', $user->id)->get();

        return response()->json($inventories, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:cafe,bakeshop,personal,other',
            'description' => 'nullable|string',
        ]);

        $user = auth()->user();

        // Validate if the user has an active subscription
        $hasActiveSubscription = $user->subscriptions()
            ->wherePivot('status', 'active')
            ->wherePivot('expiry_date', '>', now())
            ->exists();

        if (!$hasActiveSubscription) {
            return response()->json(['message' => 'No active subscription found. Please subscribe to continue.'], 403);
        }

        // Create inventory
        $inventory = Inventory::create(array_merge($validated, ['user_id' => $user->id]));

        return response()->json($inventory, 201);
    }

    public function show(Inventory $inventory)
    {
        $user = auth()->user();

        if ($inventory->user_id !== $user->id) {
            return response()->json(['message' => 'Access denied.'], 403);
        }

        return response()->json($inventory, 200);
    }

    public function update(Request $request, Inventory $inventory)
    {
        $user = auth()->user();

        if ($inventory->user_id !== $user->id) {
            return response()->json(['message' => 'Access denied.'], 403);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'type' => 'sometimes|in:cafe,bakeshop,personal,other',
            'description' => 'nullable|string',
        ]);

        $inventory->update($validated);

        return response()->json($inventory, 200);
    }

    public function destroy(Inventory $inventory)
    {
        $user = auth()->user();

        if ($inventory->user_id !== $user->id) {
            return response()->json(['message' => 'Access denied.'], 403);
        }

        $inventory->delete();

        return response()->json(['message' => 'Inventory deleted successfully'], 200);
    }
}
