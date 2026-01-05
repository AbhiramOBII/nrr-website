@extends('admin.layouts.app')

@section('title', 'Manage Official Media')

@section('page-title', 'Official Media')
@section('page-description', 'Manage official media content')

@section('page-actions')
<a href="{{ route('admin.official-media.create') }}" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
    <i class="fas fa-plus"></i>
    Add Official Media
</a>
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thumbnail</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($officialMedia as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        @if($item->isUploadedMedia() && $item->media)
                            @if($item->media->isImage())
                            <img src="{{ $item->media->url }}" alt="{{ $item->title_en }}" class="w-16 h-16 object-cover rounded-lg">
                            @else
                            <div class="w-16 h-16 bg-gray-800 rounded-lg flex items-center justify-center">
                                <i class="fas fa-video text-white"></i>
                            </div>
                            @endif
                        @elseif($item->media_type === 'youtube')
                            <img src="{{ $item->getThumbnail() }}" alt="{{ $item->title_en }}" class="w-16 h-16 object-cover rounded-lg">
                        @else
                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                <i class="fab fa-{{ $item->media_type }} text-2xl text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $item->title_en }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($item->description_en, 50) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center gap-2">
                            @if($item->media_type === 'youtube')
                            <i class="fab fa-youtube text-red-600"></i>
                            @elseif($item->media_type === 'instagram')
                            <i class="fab fa-instagram text-pink-600"></i>
                            @elseif($item->media_type === 'facebook')
                            <i class="fab fa-facebook text-blue-600"></i>
                            @elseif($item->media_type === 'twitter')
                            <i class="fab fa-twitter text-blue-400"></i>
                            @elseif($item->media_type === 'video')
                            <i class="fas fa-video text-gray-600"></i>
                            @else
                            <i class="fas fa-image text-gray-600"></i>
                            @endif
                            <span class="text-xs text-gray-500 uppercase">{{ $item->media_type }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $item->published_date ? $item->published_date->format('M d, Y') : 'Not set' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.official-media.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.official-media.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
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
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-photo-video text-4xl mb-4 text-gray-300"></i>
                        <p>No official media found. <a href="{{ route('admin.official-media.create') }}" class="text-primary hover:underline">Add your first one</a></p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($officialMedia->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $officialMedia->links() }}
    </div>
    @endif
</div>
@endsection
