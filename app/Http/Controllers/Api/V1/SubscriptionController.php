<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        // List all subscriptions
        return response()->json(Subscription::all(), 200);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'expiry_date' => 'required|date|after:start_date',
            'status' => 'required|in:active,inactive',
            'inventory_limit' => 'required|integer|min:1',
        ]);

        // Create subscription
        $subscription = Subscription::create($validated);

        return response()->json($subscription, 201);
    }

    public function show(Subscription $subscription)
    {
        // Show a specific subscription
        return response()->json($subscription, 200);
    }

    public function update(Request $request, Subscription $subscription)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'start_date' => 'sometimes|date',
            'expiry_date' => 'sometimes|date|after:start_date',
            'status' => 'sometimes|in:active,inactive',
            'inventory_limit' => 'sometimes|integer|min:1',
        ]);

        // Update subscription
        $subscription->update($validated);

        return response()->json($subscription, 200);
    }

    public function destroy(Subscription $subscription)
    {
        // Delete subscription
        $subscription->delete();

        return response()->json(['message' => 'Subscription deleted successfully'], 200);
    }
}
