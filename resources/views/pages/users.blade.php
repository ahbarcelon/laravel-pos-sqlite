@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
<div class="container page-stack">
    <div class="page-intro"><div><p class="eyebrow"><span class="eyebrow-line"></span> Team directory</p><h1>User accounts</h1><p class="intro-copy">Know who's on the team and the role they play.</p></div><span class="read-only-note"><span class="note-dot"></span> SQLite powered · Read only</span></div>

    <div class="directory-summary"><div class="summary-icon summary-icon-violet" aria-hidden="true">▦</div><div><span class="summary-label">Total users</span><strong>{{ $users->count() }}</strong></div><div class="summary-separator"></div><div><span class="summary-label">Active accounts</span><strong>{{ $activeCount }}</strong></div><p>Team profiles are retrieved directly from SQLite.</p></div>

    <section class="table-card" aria-labelledby="user-list-title" data-search-table>
        <div class="table-toolbar"><div><p class="eyebrow">Directory</p><h2 id="user-list-title">All team members <span class="title-count">{{ $users->count() }}</span></h2><p>Find a person by name, username, ID, email, role, status, or date.</p></div><div class="search-wrap"><label class="sr-only" for="user-search">Search users</label><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.3" stroke="currentColor" stroke-width="1.8"/><path d="m16 16 4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg><input id="user-search" type="search" placeholder="Search team..." autocomplete="off" data-search-input></div></div>
        <div class="table-scroll"><table class="account-table"><thead><tr><th scope="col">User ID</th><th scope="col">Team member</th><th scope="col">Email address</th><th scope="col">Role</th><th scope="col">Status</th><th scope="col">Date created</th></tr></thead><tbody>
            @foreach ($users as $user)
                <tr data-search-row><td data-label="User ID"><span class="record-id">{{ $user->user_id }}</span></td><td data-label="Team member"><span class="person-cell"><span class="avatar avatar-violet" aria-hidden="true">{{ strtoupper(substr($user->full_name, 0, 1)) }}</span><span class="person-details"><strong>{{ $user->full_name }}</strong><small>{{ '@'.$user->username }}</small></span></span></td><td data-label="Email"><a class="table-email" href="mailto:{{ $user->email }}">{{ $user->email }}</a></td><td data-label="Role"><span class="role-badge role-{{ strtolower($user->role) }}">{{ $user->role }}</span></td><td data-label="Status"><span class="status-badge {{ $user->status === 'Active' ? 'status-active' : 'status-inactive' }}"><i aria-hidden="true"></i>{{ $user->status }}</span></td><td data-label="Date created"><time datetime="{{ $user->created_at->toDateString() }}">{{ $user->created_at->format('M d, Y') }}</time></td></tr>
            @endforeach
        </tbody></table></div>
        <div class="empty-search" data-search-empty hidden><span class="empty-icon" aria-hidden="true">⌕</span><h3>No team members found</h3><p>Try another name, username, ID, email, role, status, or date.</p></div>
        <div class="table-footer"><span data-search-count role="status" aria-live="polite">Showing {{ $users->count() }} of {{ $users->count() }} users</span><span>Database records · Read only</span></div>
    </section>
</div>
@endsection
