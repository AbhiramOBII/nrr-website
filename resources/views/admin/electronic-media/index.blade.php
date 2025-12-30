@extends('admin.layouts.app')

@section('title', 'Manage Electronic Media')

@section('page-title', 'Electronic Media')
@section('page-description', 'Manage YouTube videos and electronic media')

@section('page-actions')
<a href="{{ route('admin.electronic-media.create') }}" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
    <i class="fas fa-plus"></i>
    Add Video
</a>
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Video</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($electronicMedia as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="w-24 h-16 bg-gray-200 rounded-lg overflow-hidden relative">
                            <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title_en }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-play-circle text-white text-2xl opacity-80"></i>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $item->title_en }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($item->short_description_en, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ $item->youtube_url }}" target="_blank" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        <a href="{{ route('admin.electronic-media.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.electronic-media.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                        <i class="fab fa-youtube text-4xl mb-4 text-gray-300"></i>
                        <p>No electronic media found. <a href="{{ route('admin.electronic-media.create') }}" class="text-primary hover:underline">Add your first video</a></p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($electronicMedia->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $electronicMedia->links() }}
    </div>
    @endif
</div>
@endsection
