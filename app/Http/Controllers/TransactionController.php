<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // app/Http/Controllers/TransactionController.php
    public function coursefilter(Request $request)
    {
        $teacherId = $request->input('teacherId');


        // $query = Transaction::query();

        if ($teacherId == 0) {
            $transactions = Transaction::where('teacher_id', '!=', 0)->get();
        } else {

            $transactions = Transaction::where('teacher_id', '=', $teacherId)->where('teacher_id', $teacherId)->get();
        }

        // dd($transactions);


        $response = [];

        foreach ($transactions as $item) {
            $response[] = [
                'coursetitle' => $item->order->course->title,
                'transaction_id' => $item->transaction_id,
                'creator_name' => $item->creator->name,
                'amount' => $item->amount,
                'ratio' => $item->ratio,
                'teacher' => $item->teacher,
                'owner' => $item->owner,
                'created_at' => $item->created_at,
            ];
        }

        return response()->json($response);
    }
    public function shopfilter(Request $request)
    {
        $studentId = $request->input('studentId');
        if ($studentId == 0) {
            $transactions = Transaction::where('teacher_id', 0)->get();
        } else {
            $transactions = Transaction::where('teacher_id', 0)->where('student_id', $studentId)->get();
        }





        // $transactions = $query->get();
        // dd($transactions);
        $response = [];

        foreach ($transactions as $item) {
            $response[] = [
                'coursetitle' => $item->order->product->name,
                'transaction_id' => $item->transaction_id,
                'student_name' => $item->student->name,
                'amount' => $item->amount,
                'ratio' => $item->ratio,
                'owner' => $item->owner,
                'created_at' => $item->created_at,
            ];
        }

        return response()->json($response);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function course()
    {
        $transactions = Transaction::where('teacher_id', '!=', 0)->get();
        // dd($transactions);
        $orders = Order::where('status', 1)->where('type', 1)->get();
        $studentIds = $orders->pluck('user_id')->unique();
        $students = User::whereIn('id', $studentIds)->get();
        $teacherIds = $transactions->pluck('teacher_id')->unique();
        $teachers = User::whereIn('id', $teacherIds)->get();

        return view('admin.pages.transaction.course', compact('transactions', 'teachers'));
    }

    public function shop()
    {
        $transactions = Transaction::where('teacher_id', 0)->get();
        // dd($transactions);
        $orders = Order::where('status', 1)->where('type', 2)->get();
        $studentIds = $orders->pluck('user_id')->unique();
        $students = User::whereIn('id', $studentIds)->get();
        return view('admin.pages.transaction.shop', compact('transactions', 'students'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
