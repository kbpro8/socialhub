<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display the subscription management page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $intent = $user->createSetupIntent();

        return view('subscription.index', [
            'intent' => $intent,
            'currentPlan' => $user->subscription('default') ?? null,
        ]);
    }

    /**
     * Store a new subscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'plan' => ['required', 'string', \Illuminate\Validation\Rule::in(array_keys(config('plans')))],
            'payment_method' => ['required', 'string'],
        ]);

        $user = $request->user();
        $plan = $request->input('plan');
        $paymentMethod = $request->input('payment_method');

        $user->newSubscription('default', config("plans.{$plan}.price_id"))
             ->create($paymentMethod);

        return back()->with('status', 'Subscription successful!');
    }
}
