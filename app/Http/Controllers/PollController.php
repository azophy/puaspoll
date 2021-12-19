<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            'items' => Poll::where('is_public', true)
                ->orderBy('id', 'desc')
                ->limit(10)
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePollRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePollRequest $request)
    {
        $inputData = $request->validated();
        $inputData['choice'] = [];
        $inputData['expire_time'] = Carbon::now()->addHours(24 * 7);
        $inputData['is_public'] = $request->input('is_public', 'off') == 'on';

        foreach ($inputData['choice_title'] as $title) {
            $inputData['choice'][] = [
                'title' => $title,
                'score' => 0,
                'num_voter' => 0,
            ];
        }

        if ($poll = Poll::create($inputData)) {
            return redirect()->route('polls.show', [
                'slug' => $poll->slug,
            ])->with('status', 'Poll successfully created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string   $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $poll = Poll::findBySlugOrFail($slug);

        return view('poll.input', [
            'item' => $poll,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string   $slug
     * @return \Illuminate\Http\Response
     */
    public function result($slug)
    {
        $poll = Poll::findBySlugOrFail($slug);

        return view('poll.result', compact('poll'));
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
        $poll = Poll::findBySlugOrFail($slug);

        if (session("submission_received_$slug")) {
            abort('401', 'You has submitted your vote for this poll');
        }

        $validated = $request->validate([
            'g-recaptcha-response' => 'recaptcha',
            'poll-choice' => [
                // sum of poll-choice score must be between 0 and VOTE_BUDGET
                function ($attribute, $value, $fail) {
                    $sumScore = 0;

                    foreach ($value as $key => $val) {
                        $sumScore += $val;
                    }

                    if ($sumScore < 0 || $sumScore > Poll::VOTE_BUDGET) {
                        $fail('Sum of all vote must be between 0 and ' . Poll::VOTE_BUDGET);
                    }
                },
            ],
        ]);

        $tempChoice = $poll->choice;
        foreach ($request->input('poll-choice') as $index => $val) {
            $tempChoice[$index]['score'] += $val;
            $tempChoice[$index]['num_voter'] += empty($val) ? 0 : 1;
        }

        $poll->choice = $tempChoice;
        $poll->num_voter++;

        if ($poll->save()) {
            $request->session()->flash('status', "Submission received !");
        }

        session(["submission_received_$slug" => true]);

        return redirect()->route('polls.show', compact('slug'));
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
