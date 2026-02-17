@extends('admin.layouts.app')

@section('header', 'Manage Projects')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h3 class="text-xl font-bold text-white">All Projects</h3>
    <a href="{{ route('admin.projects.create') }}" class="px-6 py-3 rounded-xl bg-primary hover:bg-purple-600 text-white font-bold text-sm transition-colors shadow-lg shadow-purple-500/20">
        <i class="fas fa-plus mr-2"></i> Add Project
    </a>
</div>

<div class="bg-dark rounded-2xl border border-slate-800 overflow-hidden">
    <table class="w-full text-left text-sm text-slate-400">
        <thead class="bg-slate-800/50 text-xs uppercase font-bold tracking-widest text-slate-500">
            <tr>
                <th class="px-6 py-4">Image</th>
                <th class="px-6 py-4">Title</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Date</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($projects as $project)
            <tr class="hover:bg-slate-800/30 transition-colors">
                <td class="px-6 py-4">
                    <img src="{{ asset('storage/' . $project->image) }}" class="w-12 h-12 rounded-lg object-cover bg-slate-800" alt="">
                </td>
                <td class="px-6 py-4 font-medium text-white">{{ $project->title }}</td>
                <td class="px-6 py-4">
                    @if($project->is_active)
                        <span class="px-2 py-1 rounded bg-green-500/10 text-green-400 text-xs font-bold border border-green-500/20">Active</span>
                    @else
                        <span class="px-2 py-1 rounded bg-red-500/10 text-red-400 text-xs font-bold border border-red-500/20">Inactive</span>
                    @endif
                </td>
                <td class="px-6 py-4">{{ $project->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-400 hover:text-blue-300 transition-colors"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 transition-colors"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-slate-600">No projects found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $projects->links() }}
</div>
@endsection
