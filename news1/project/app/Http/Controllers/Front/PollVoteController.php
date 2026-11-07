<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PollAnswer;
use App\Models\PollResult;
use Illuminate\Support\Facades\DB;

class PollVoteController extends Controller
{
    // ভোট সাবমিট
    public function vote(Request $request)
    {
        $ip = $request->ip();
        $question_id = $request->poll_question_id;
        $answer_id = $request->poll_answer_id;

        if (!$answer_id) {
            return response()->json(['status' => 'error', 'message' => 'Please select any option']);
        }

        $already = PollResult::where('poll_question_id', $question_id)
            ->where('ip_address', $ip)
            ->first();

        if ($already) {
            return response()->json(['status' => 'error', 'message' => 'You already voted this poll']);
        }

        PollResult::create([
            'poll_question_id' => $question_id,
            'poll_answer_id' => $answer_id,
            'ip_address' => $ip,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Vote submitted successfully']);
    }
	
	

    // ভোট রেজাল্ট
    public function result($id)
    {
        $totalVotes = PollResult::where('poll_question_id', $id)->count();
        $answers = PollAnswer::where('poll_question_id', $id)->get();

        if ($totalVotes == 0) {
            return '<p class="text-muted">No votes yet.</p>';
        }

        $html = '<div class="poll-result-box">';
        foreach ($answers as $ans) {
            $count = PollResult::where('poll_answer_id', $ans->id)->count();
            $percent = $totalVotes > 0 ? round(($count / $totalVotes) * 100) : 0;

            $html .= '
                <div class="poll-result-item">
                    <div class="poll-answer-label">' . $ans->poll_option . ' (' . $percent . '%)</div>
                    <div class="progress">
                        <div class="progress-bar bg-info" style="width:' . $percent . '%;">' . $percent . '%</div>
                    </div>
                </div>';
        }
        $html .= '</div>';

        return $html;
    }
}
