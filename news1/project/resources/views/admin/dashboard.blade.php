@extends('layouts.admin')

@section('content')
<style>
/* 🔹 Dashboard Style */
.dashboard-header {
    background: linear-gradient(90deg, #3b82f6, #8b5cf6);
    border-radius: 12px;
    color: #fff;
    padding: 25px 30px;
    margin-bottom: 30px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
.dashboard-header h2 {
    font-weight: 600;
    margin-bottom: 8px;
}
.dashboard-header p {
    font-size: 15px;
    opacity: 0.9;
}

.dashboard-card {
    border-radius: 12px;
    color: #fff;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}
.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.2);
}
.dashboard-card h5 {
    font-size: 18px;
    margin-bottom: 8px;
}
.dashboard-card h2 {
    font-size: 30px;
    font-weight: 700;
}
.dashboard-card a {
    color: #fff;
    text-decoration: underline;
    font-weight: 500;
}
.dashboard-card .icon {
    font-size: 38px;
    opacity: 0.8;
}

/* 🔹 Colors */
.gradient-blue { background: linear-gradient(135deg, #2563eb, #3b82f6); }
.gradient-orange { background: linear-gradient(135deg, #f59e0b, #fbbf24); }
.gradient-purple { background: linear-gradient(135deg, #7e22ce, #a855f7); }
.gradient-green { background: linear-gradient(135deg, #16a34a, #22c55e); }
.gradient-red { background: linear-gradient(135deg, #dc2626, #ef4444); }
.gradient-dark { background: linear-gradient(135deg, #0f172a, #334155); }

/* 🔹 Spacing */
.row.g-4 {
    row-gap: 25px;
}
</style>

<div class="content-area">

    {{-- 🔹 Welcome Banner --}}
    <div class="dashboard-header">
        <h2>Welcome, {{ Auth::guard('admin')->user()->name }}</h2>
        <p>Here's an overview of your activity today 👋</p>
    </div>

    {{-- 🔹 Cards Section --}}
    <div class="row g-4 mt-3">

        {{-- Posts --}}
        <div class="col-md-6 col-lg-4">
            <div class="dashboard-card gradient-blue">
                <div>
                    <h5>Posts</h5>
                    @php $user = Auth::guard('admin')->user()->role; @endphp
                    @if ($user->name != 'admin' && $user->name != 'moderator')
                        <h2>{{ $author_post }}</h2>
                    @else
                        <h2>{{ $total_post }}</h2>
                    @endif
                    <a href="{{ route('post.index') }}">View All</a>
                </div>
                <div class="icon"><i class="fab fa-blogger-b"></i></div>
            </div>
        </div>

        {{-- Pending --}}
        <div class="col-md-6 col-lg-4">
            <div class="dashboard-card gradient-orange">
                <div>
                    <h5>Pending Posts</h5>
                    @if ($user->name != 'admin' && $user->name != 'moderator')
                        <h2>{{ $author_pending }}</h2>
                    @else
                        <h2>{{ $pending_posts }}</h2>
                    @endif
                    <a href="{{ route('pending.index') }}">View All</a>
                </div>
                <div class="icon"><i class="fas fa-hourglass-half"></i></div>
            </div>
        </div>

        {{-- Drafts --}}
        <div class="col-md-6 col-lg-4">
            <div class="dashboard-card gradient-purple">
                <div>
                    <h5>Drafts</h5>
                    <h2>{{ $drafts }}</h2>
                    <a href="{{ route('draft.index') }}">View All</a>
                </div>
                <div class="icon"><i class="fas fa-pen-nib"></i></div>
            </div>
        </div>

        {{-- Schedule --}}
        <div class="col-md-6 col-lg-4">
            <div class="dashboard-card gradient-green">
                <div>
                    <h5>Scheduled Posts</h5>
                    <h2>{{ $schedules }}</h2>
                    <a href="{{ route('schedule.index') }}">View All</a>
                </div>
                <div class="icon"><i class="fas fa-clock"></i></div>
            </div>
        </div>

        {{-- RSS --}}
        <div class="col-md-6 col-lg-4">
            <div class="dashboard-card gradient-red">
                <div>
                    <h5>RSS Feeds</h5>
                    <h2>{{ $rss }}</h2>
                    <a href="{{ route('rss.index') }}">View All</a>
                </div>
                <div class="icon"><i class="fas fa-rss"></i></div>
            </div>
        </div>

        {{-- Polls --}}
        <div class="col-md-6 col-lg-4">
            <div class="dashboard-card gradient-dark">
                <div>
                    <h5>Polls</h5>
                    <h2>{{ $polls }}</h2>
                    <a href="{{ route('addPolls.index') }}">View All</a>
                </div>
                <div class="icon"><i class="fas fa-poll"></i></div>
            </div>
        </div>
    </div>

    {{-- 🔹 Second Section (Users, Fonts, Subscribers) --}}
    <div class="row mt-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center shadow-sm p-3">
                <h4>{{ App\Models\Admin::where('id','!=',1)->where('created_at','>',Carbon\Carbon::now()->subDays(30))->count() }}</h4>
                <p>New Users (30 Days)</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center shadow-sm p-3">
                <h4>{{ App\Models\Admin::where('id','!=',1)->count() }}</h4>
                <p>Total Users</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center shadow-sm p-3">
                <h4>{{ App\Models\Subscriber::count() }}</h4>
                <p>Subscribers</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card text-center shadow-sm p-3">
                <h4>{{ App\Models\Font::count() }}</h4>
                <p>Total Fonts</p>
            </div>
        </div>
    </div>

    {{-- 🔹 Tables --}}
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <h5 class="card-header bg-primary text-white">Recent Users</h5>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead><tr><th>Email</th><th>Joined</th></tr></thead>
                        <tbody>
                            @foreach($userRole as $role)
                                @foreach ($role->users()->orderBy('id','desc')->take(10)->get() as $data)
                                    <tr>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->created_at }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <h5 class="card-header bg-success text-white">Subscribers</h5>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead><tr><th>#</th><th>Email</th></tr></thead>
                        <tbody>
                            @foreach($subscribers as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
