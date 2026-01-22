<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index(): View
    {
        return view('admin.plans.index', [
            'plans' => Plan::orderBy('price')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.plans.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'interval' => ['required', 'in:month,year'],
            'features' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $features = array_filter(array_map('trim', explode("\n", $data['features'] ?? '')));

        Plan::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'interval' => $data['interval'],
            'features' => $features,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.plans.index')->with('status', 'تمت إضافة الباقة بنجاح.');
    }

    public function edit(Plan $plan): View
    {
        return view('admin.plans.edit', [
            'plan' => $plan,
            'features' => implode("\n", $plan->features ?? []),
        ]);
    }

    public function update(Request $request, Plan $plan): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'interval' => ['required', 'in:month,year'],
            'features' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $features = array_filter(array_map('trim', explode("\n", $data['features'] ?? '')));

        $plan->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'interval' => $data['interval'],
            'features' => $features,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.plans.index')->with('status', 'تم تحديث الباقة بنجاح.');
    }

    public function destroy(Plan $plan): RedirectResponse
    {
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('status', 'تم حذف الباقة بنجاح.');
    }
}
