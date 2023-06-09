<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class UserFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFeedbackRequest $request)
    {
        Feedback::create([
            'tasklevel' =>$request['tasklevel'],
            'rating' =>$request['rating'],
            'recommendations' =>$request['recommendations'],
            'user_id' =>auth()->user()->id,
        ]);

        return redirect()->back()->with('done','Thank you for your time');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
