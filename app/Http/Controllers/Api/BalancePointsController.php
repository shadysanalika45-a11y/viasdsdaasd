<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BalancePointsController extends Controller
{
    public function updateBalance(Request $request): JsonResponse
    {
        $data = $request->validate([
            'amount' => ['required', 'numeric'],
            'type' => ['required', 'in:credit,debit'],
            'gateway' => ['nullable', 'string', 'max:100'],
            'reference' => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        $balance = Balance::firstOrCreate(
            ['user_id' => $request->user()->id],
            ['amount' => 0, 'points' => 0, 'currency' => 'USD']
        );

        if ($data['type'] === 'debit' && $balance->amount < $data['amount']) {
            return response()->json(['message' => 'Insufficient balance.'], 422);
        }

        if ($data['type'] === 'credit') {
            $balance->increment('amount', $data['amount']);
        } else {
            $balance->decrement('amount', $data['amount']);
        }

        $transaction = Transaction::create([
            'user_id' => $request->user()->id,
            'type' => $data['type'],
            'amount' => $data['amount'],
            'status' => 'completed',
            'gateway' => $data['gateway'] ?? null,
            'reference' => $data['reference'] ?? null,
            'description' => $data['description'] ?? null,
        ]);

        return response()->json([
            'message' => 'Balance updated successfully.',
            'balance' => $balance->fresh(),
            'transaction' => $transaction,
        ]);
    }

    public function updatePoints(Request $request): JsonResponse
    {
        $data = $request->validate([
            'points' => ['required', 'integer'],
            'type' => ['required', 'in:add,subtract'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        $balance = Balance::firstOrCreate(
            ['user_id' => $request->user()->id],
            ['amount' => 0, 'points' => 0, 'currency' => 'USD']
        );

        if ($data['type'] === 'subtract' && $balance->points < $data['points']) {
            return response()->json(['message' => 'Insufficient points.'], 422);
        }

        if ($data['type'] === 'add') {
            $balance->increment('points', $data['points']);
        } else {
            $balance->decrement('points', $data['points']);
        }

        $transaction = Transaction::create([
            'user_id' => $request->user()->id,
            'type' => $data['type'] === 'add' ? 'credit' : 'debit',
            'amount' => 0,
            'points' => $data['points'],
            'status' => 'completed',
            'description' => $data['description'] ?? null,
        ]);

        return response()->json([
            'message' => 'Points updated successfully.',
            'balance' => $balance->fresh(),
            'transaction' => $transaction,
        ]);
    }

    public function rateVideo(Request $request, Video $video): JsonResponse
    {
        $data = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
        ]);

        $video->increment('rating_total', $data['rating']);
        $video->increment('rating_count');

        $average = $video->rating_total / max($video->rating_count, 1);

        $video->forceFill(['average_rating' => round($average, 2)])->save();

        return response()->json([
            'message' => 'Rating recorded successfully.',
            'video' => $video->fresh(),
        ]);
    }
}
