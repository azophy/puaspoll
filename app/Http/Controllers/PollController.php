<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Poll;
use App\Http\Requests\StorePollRequest;
use App\Http\Requests\UpdatePollRequest;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('poll.index', [
            'items' => Poll::orderBy('id', 'desc')->limit(10)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePollRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePollRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string   $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $poll = Poll::where(compact('slug'))->first();
        if (empty($poll)) abort(404, 'Poll not found');

        return view('poll.input', [
            'item' => $poll,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Accept Post Submission
     *
     * @param  string   $slug
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function input($slug, Request $request)
    {
        $poll = Poll::where(compact('slug'))->first();
        if (empty($poll)) abort(404, 'Poll not found');

        $tempChoice = $poll->choice;
        foreach ($request->input('poll-choice') as $index => $val) {
            $tempChoice[$index]['score'] += $val;
            $tempChoice[$index]['num_voter'] += empty($val) ? 0 : 1;
        }

        $poll->update(['choice' => $tempChoice]);

        return [
            'success' => true,
            'poll_data' => $poll->toArray(),
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePollRequest  $request
     * @param  \App\Models\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePollRequest $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        //
    }
}
