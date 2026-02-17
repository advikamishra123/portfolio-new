@extends('admin.layouts.app')

@section('header', 'Read Message')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.contacts.index') }}" class="text-slate-500 hover:text-white transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Back to Messages
        </a>
    </div>

    <div class="bg-dark rounded-2xl border border-slate-800 p-8 shadow-xl">
        <div class="flex justify-between items-start mb-6 pb-6 border-b border-slate-800">
            <div>
                <h2 class="text-2xl font-bold text-white mb-1">{{ $contact->subject }}</h2>
                <div class="text-slate-400 text-sm">
                    From: <span class="text-purple-400 font-bold">{{ $contact->name }}</span> &lt;{{ $contact->email }}&gt;
                </div>
            </div>
            <div class="text-right text-slate-500 text-xs font-mono">
                {{ $contact->created_at->format('M d, Y h:i A') }}
            </div>
        </div>

        <div class="prose prose-invert max-w-none text-slate-300 leading-relaxed whitespace-pre-wrap">
{{ $contact->message }}
        </div>

        <div class="mt-8 pt-6 border-t border-slate-800 flex justify-end gap-3">
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $contact->email }}&su=Re: {{ urlencode($contact->subject) }}" target="_blank" class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm transition-colors shadow-lg">
                <i class="fab fa-google mr-2"></i> Reply via Gmail
            </a>
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-6 py-3 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 font-bold text-sm transition-colors border border-red-500/20">
                    <i class="fas fa-trash mr-2"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
