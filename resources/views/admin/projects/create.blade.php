@extends('admin.layouts.app')

@section('header', 'Add New Project')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-dark rounded-2xl border border-slate-800 p-8 shadow-xl">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Title -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Project Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none text-white transition-all">
                @error('title') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Description</label>
                <textarea name="description" required rows="4" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none text-white transition-all">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Link -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Project Link (URL)</label>
                    <input type="url" name="link" value="{{ old('link') }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none text-white transition-all">
                    @error('link') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 focus:border-purple-500 focus:ring-4 focus:ring-purple-500/10 outline-none text-white transition-all">
                </div>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2">Project Image</label>
                <div class="relative group cursor-pointer">
                    <input type="file" name="image" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="bg-slate-900 border-2 border-dashed border-slate-700 rounded-xl p-8 text-center group-hover:border-purple-500 transition-colors">
                        <i class="fas fa-cloud-upload-alt text-3xl text-slate-600 mb-3 group-hover:text-purple-500 transition-colors"></i>
                        <p class="text-slate-400 text-sm font-medium">Click to upload image</p>
                        <p class="text-slate-600 text-xs mt-1">PNG, JPG up to 2MB</p>
                    </div>
                </div>
                @error('image') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
            </div>

            <!-- Status Toggle -->
            <div class="flex items-center gap-3 py-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-5 h-5 rounded bg-slate-900 border-slate-700 text-purple-500 focus:ring-purple-500/50">
                <label for="is_active" class="text-sm font-bold text-slate-300">Active (Visible on Portfolio)</label>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full py-4 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold transition-all shadow-lg hover:shadow-purple-500/20">
                Create Project
            </button>
        </form>
    </div>
</div>
@endsection
