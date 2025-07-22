<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kampanye') }}: {{ $campaign->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.campaigns.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Judul Kampanye</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('title', $campaign->title) }}" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('description', $campaign->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Gambar Kampanye (Biarkan kosong jika tidak ingin mengubah)</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            @if($campaign->image)
                                <p class="mt-2 text-sm text-gray-600">Gambar saat ini:</p>
                                <img src="{{ asset('storage/' . $campaign->image) }}" alt="Current Image" class="mt-2 w-32 h-auto rounded-lg">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="target_amount" class="block text-sm font-medium text-gray-700">Target Donasi (Rp)</label>
                            <input type="number" name="target_amount" id="target_amount" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('target_amount', $campaign->target_amount) }}" required min="1000">
                            @error('target_amount')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status Kampanye</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="pending" {{ old('status', $campaign->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ old('status', $campaign->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ old('status', $campaign->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                <option value="completed" {{ old('status', $campaign->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="deleted" {{ old('status', $campaign->status) == 'deleted' ? 'selected' : '' }}>Deleted</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Update Kampanye
                            </button>
                            <a href="{{ route('admin.campaigns.index') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:bg-gray-500 active:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>