@extends('admin.layouts.app')

@section('header', 'Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stat Card -->
    <div class="p-6 rounded-2xl bg-dark border border-slate-800">
        <div class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-2">Total Projects</div>
        <div class="text-3xl font-black text-white">{{ $stats['total_projects'] }}</div>
    </div>
    <div class="p-6 rounded-2xl bg-dark border border-slate-800">
        <div class="text-purple-400 text-xs font-bold uppercase tracking-widest mb-2">Active Projects</div>
        <div class="text-3xl font-black text-white">{{ $stats['active_projects'] }}</div>
    </div>
    <div class="p-6 rounded-2xl bg-dark border border-slate-800">
        <div class="text-slate-500 text-xs font-bold uppercase tracking-widest mb-2">Total Messages</div>
        <div class="text-3xl font-black text-white">{{ $stats['total_contacts'] }}</div>
    </div>
    <div class="p-6 rounded-2xl bg-dark border border-slate-800">
        <div class="text-blue-400 text-xs font-bold uppercase tracking-widest mb-2">Unread Messages</div>
        <div class="text-3xl font-black text-white">{{ $stats['unread_contacts'] }}</div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="p-6 rounded-2xl bg-dark border border-slate-800">
        <h3 class="font-bold text-white mb-4">Quick Actions</h3>
        <div class="space-y-3">
            <a href="{{ route('admin.projects.create') }}" class="block p-4 rounded-xl bg-slate-800 hover:bg-slate-700 transition-colors flex items-center justify-between group">
                <span class="font-medium text-slate-300 group-hover:text-white">Add New Project</span>
                <i class="fas fa-plus text-primary"></i>
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="block p-4 rounded-xl bg-slate-800 hover:bg-slate-700 transition-colors flex items-center justify-between group">
                <span class="font-medium text-slate-300 group-hover:text-white">View Messages</span>
                <i class="fas fa-arrow-right text-secondary"></i>
            </a>
        </div>
    </div>
</div>
@endsection
