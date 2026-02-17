@extends('admin.layouts.app')

@section('header', 'Messages')

@section('content')
<div class="bg-dark rounded-2xl border border-slate-800 overflow-hidden">
    <table class="w-full text-left text-sm text-slate-400">
        <thead class="bg-slate-800/50 text-xs uppercase font-bold tracking-widest text-slate-500">
            <tr>
                <th class="px-6 py-4">From</th>
                <th class="px-6 py-4">Subject</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Date</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($contacts as $contact)
            <tr class="hover:bg-slate-800/30 transition-colors {{ !$contact->is_read ? 'bg-slate-800/20' : '' }}">
                <td class="px-6 py-4">
                    <div class="font-bold text-white">{{ $contact->name }}</div>
                    <div class="text-xs text-slate-500">{{ $contact->email }}</div>
                </td>
                <td class="px-6 py-4 font-medium {{ !$contact->is_read ? 'text-white' : '' }}">{{ Str::limit($contact->subject, 30) }}</td>
                <td class="px-6 py-4">
                    @if(!$contact->is_read)
                        <span class="px-2 py-1 rounded bg-blue-500/10 text-blue-400 text-xs font-bold border border-blue-500/20">New</span>
                    @else
                        <span class="px-2 py-1 rounded bg-slate-500/10 text-slate-400 text-xs font-bold border border-slate-500/20">Read</span>
                    @endif
                </td>
                <td class="px-6 py-4">{{ $contact->created_at->diffForHumans() }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-purple-400 hover:text-purple-300 transition-colors"><i class="fas fa-eye"></i></a>
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 transition-colors"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-slate-600">No messages found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $contacts->links() }}
</div>
@endsection
