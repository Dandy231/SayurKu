<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    // TODO Transaction All
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 5);
        $product_id = $request->input('product_id');
        $status = $request->input('status');

        // TODO Find Destination by Id
        if ($id) {
            $transaction = Transaction::with(['product', 'user'])->find($id);

            if ($transaction) {
                return ResponseFormatter::success(
                    $transaction,
                    'Data transaction Fetched'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data transaction not found',
                    404
                );
            }
        }

        // TODO Query Transaction
        $transaction = Transaction::with(['product', 'user'])
            ->where('user_id', Auth::user()->id);

        // Todo Transaction by Destination Id
        if ($product_id) {
            $transaction->where('product_id', $product_id);
        }

        // TODO Status
        if ($status) {
            $transaction->where('status', $status);
        }

        return ResponseFormatter::success(
            $transaction->paginate($limit),
            'List Transaction Fetched'
        );
    }

    // TODO Checkout
    public function checkout(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'user_id' => 'required|exists:users,id',
                'quantity' => 'required',
                'total' => 'required',
                'status' => 'required',
            ]);

            // if ($request->fails()) {
            //     return response()->json($request->errors(), 400);
            // }

            $transaction = Transaction::create([
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
                'quantity' => $request->quantity,
                'total' => $request->total,
                'status' => $request->status,
                'picturePayment' => '',
            ]);

            // TODO Call Transaction was created
            $transaction = Transaction::with(['product', 'user'])->find($transaction->id);
            return ResponseFormatter::success(
                $transaction,
                'Transaction Successfull'
            );
        } catch (Exception $e) {
            return ResponseFormatter::error(
                $e->getMessage(),
                'Transaction Fail'
            );
        }
    }

    //TODO Upload Payment Transfer
    public function updatePayment(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:2048'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                ['error' => $validator->errors()],
                'Update Payment Fails',
                401
            );
        }

        if ($request->file('file')) {
            $file = $request->file->store('assets/user/payment', 'public');
            // TODO Save Photo
            $transaction->picturePayment = $file;
            $transaction->update();
            return ResponseFormatter::success([$file], 'File successfuly uploaded');
        }
    }
}
