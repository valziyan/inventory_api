<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\UserSubscription;
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
            'type' => 'required|in:monthly,yearly', // Validate type
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
            'type' => 'sometimes|in:monthly,yearly',
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

    public function assignToUser(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'subscription_id' => 'required|exists:subscriptions,id',
            'start_date' => 'required|date',
            'expiry_date' => 'required|date|after:start_date',
            'status' => 'required|in:active,inactive',
        ]);

        // Assign subscription to user
        $userSubscription = UserSubscription::create($validated);

        return response()->json($userSubscription, 201);
    }

    public function userSubscriptions($userId)
    {
        // Get subscriptions for a user
        $subscriptions = UserSubscription::where('user_id', $userId)->with('subscription')->get();

        return response()->json($subscriptions, 200);
    }
}
