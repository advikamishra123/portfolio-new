@extends('admin.layouts.app')

@section('header', 'Edit Project')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-dark rounded-2xl border border-slate-800 p-8 shadow-xl">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Title -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Project Title</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none text-white transition-all">
                @error('title') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Description</label>
                <textarea name="description" required rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none text-white transition-all">{{ old('description', $project->description) }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Link -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Project Link (URL)</label>
                    <input type="url" name="link" value="{{ old('link', $project->link) }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none text-white transition-all">
                    @error('link') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none text-white transition-all">
                </div>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Project Image</label>
                <div class="flex items-center gap-6">
                    <img src="{{ asset('storage/' . $project->image) }}" class="w-20 h-20 rounded-xl object-cover border border-slate-700" alt="Current Image">
                    <div class="flex-1 relative group cursor-pointer">
                        <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div class="bg-slate-900 border-2 border-dashed border-slate-700 rounded-xl p-4 text-center group-hover:border-purple-500 transition-colors">
                            <span class="text-slate-400 text-sm font-medium">Change Image</span>
                        </div>
                    </div>
                </div>
                @error('image') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Status Toggle -->
            <div class="flex items-center gap-3 py-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }} class="w-5 h-5 rounded bg-slate-900 border-slate-700 text-purple-500 focus:ring-purple-500/50">
                <label for="is_active" class="text-sm font-bold text-slate-300">Active (Visible on Portfolio)</label>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full py-4 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold transition-all shadow-lg hover:shadow-purple-500/20">
                Update Project
            </button>
        </form>
    </div>
</div>
@endsection
