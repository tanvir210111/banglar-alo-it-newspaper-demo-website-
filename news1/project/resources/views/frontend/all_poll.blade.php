@extends('layouts.front')

@section('contents')
@section('meta')
<title>{{__('Voting results')}}</title>
@endsection

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hind+Siliguri:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    /* -------- Global Reset for this Section -------- */
    .pro-poll-section {
        background-color: #f8fafc; /* Very light slate bg */
        font-family: 'Inter', 'Hind Siliguri', sans-serif;
        padding: 60px 15px;
        min-height: 100vh;
    }

    .pro-container {
        max-width: 750px;
        margin: 0 auto;
    }

    /* -------- Header -------- */
    .pro-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .pro-header h2 {
        font-size: 28px;
        font-weight: 800;
        background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }
    .pro-header p {
        color: #64748b;
        font-size: 15px;
    }

    /* -------- Poll Card -------- */
    .pro-poll-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 35px;
        margin-bottom: 30px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 10px 15px -3px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(226, 232, 240, 0.8);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        position: relative;
        overflow: hidden;
    }

    .pro-poll-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.01);
    }

    /* Decorative Top Line */
    .pro-poll-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #06b6d4);
    }

    /* Question */
    .poll-question {
        font-size: 19px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 25px;
        display: flex;
        align-items: flex-start;
        line-height: 1.5;
    }
    
    .question-icon {
        color: #3b82f6;
        background: #eff6ff;
        padding: 10px;
        border-radius: 12px;
        margin-right: 15px;
        font-size: 18px;
        display: inline-flex;
    }

    /* -------- Option Styling -------- */
    .option-group {
        margin-bottom: 18px;
    }

    .option-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
        font-size: 15px;
        color: #334155;
        font-weight: 600;
    }

    .vote-pill {
        background: #f1f5f9;
        color: #475569;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
        min-width: 50px;
        text-align: center;
    }

    /* Modern Progress Bar */
    .bar-bg {
        height: 12px;
        background-color: #f1f5f9;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.05);
    }

    .bar-fill {
        height: 100%;
        background-image: linear-gradient(45deg, #3b82f6 25%, #2563eb 25%, #2563eb 50%, #3b82f6 50%, #3b82f6 75%, #2563eb 75%, #2563eb 100%);
        background-size: 20px 20px;
        border-radius: 10px;
        width: 0; /* JS handles this, but inline style overrides */
        transition: width 1.2s cubic-bezier(0.34, 1.56, 0.64, 1); /* Bouncy effect */
        animation: stripe-move 1s linear infinite;
        position: relative;
    }

    @keyframes stripe-move {
        0% { background-position: 0 0; }
        100% { background-position: 20px 20px; }
    }

    /* -------- Footer Info -------- */
    .card-footer-info {
        margin-top: 25px;
        padding-top: 15px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        color: #94a3b8;
    }
    
    .total-badge {
        display: flex;
        align-items: center;
        gap: 6px;
        background: #f8fafc;
        padding: 6px 12px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        font-weight: 600;
        color: #475569;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 40px;
        color: #94a3b8;
    }
</style>

<div class="pro-poll-section">
    <div class="pro-container">
        
        <div class="pro-header">
            <h2><i class="fas fa-chart-pie" style="color:#3b82f6; margin-right:8px;"></i>{{__('Voting results')}}</h2>
            <p>{{__('Live vote updates and statistics')}}</p>
        </div>

        @forelse ($polls as $poll)
            <div class="pro-poll-card">
                <div class="poll-question">
                    <span class="question-icon"><i class="far fa-question-circle"></i></span>
                    <span>{{ $poll->question }}</span>
                </div>

                @php
                    $results = \App\Models\PollResult::where('poll_question_id', $poll->id)->get();
                    $totalVotes = $results->count();
                    $grouped = $results->groupBy('poll_answer_id');
                @endphp

                @if ($totalVotes > 0)
                    @foreach ($grouped as $answerId => $votes)
                        @php
                            $answer = \App\Models\PollAnswer::find($answerId);
                            $answerText = $answer ? $answer->poll_option : 'অপশন মুছে ফেলা হয়েছে';
                            $percent = round(($votes->count() / $totalVotes) * 100, 1); // 1 decimal point looks cleaner
                        @endphp
                        
                        <div class="option-group">
                            <div class="option-header">
                                <span>{{ $answerText }}</span>
                                <span class="vote-pill" style="{{ $percent > 0 ? 'color: #2563eb; background: #eff6ff;' : '' }}">
                                    {{ $percent }}%
                                </span>
                            </div>
                            <div class="bar-bg">
                                <div class="bar-fill" style="width: {{ $percent }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <i class="far fa-clipboard" style="font-size:32px; margin-bottom:10px; opacity:0.5;"></i>
                        <p>এখনও কোনো ভোট পড়েনি।</p>
                    </div>
                @endif

                <div class="card-footer-info">
                    <span class="total-badge">
                        <i class="fas fa-user-check"></i> {{ $totalVotes }} {{__('Vote')}}
                    </span>
                    <span>
                        <i class="fas fa-clock"></i> {{__('Live updates')}}
                    </span>
                </div>
            </div>
        @empty
            <div class="pro-poll-card" style="text-align:center;">
                <h3>কোনো পোল পাওয়া যায়নি</h3>
                <p style="color:#94a3b8;">বর্তমানে কোনো সক্রিয় পোল নেই।</p>
            </div>
        @endforelse

    </div>
</div>

@endsection