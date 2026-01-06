@extends('admin.layouts.app')

@section('title', 'Scams Exposed')

@section('page-title', 'Scams Exposed')
@section('page-description', 'Manage corruption exposures')

@section('page-actions')
<a href="{{ route('admin.scams-exposed.create') }}" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
    <i class="fas fa-plus"></i>
    Add New
</a>
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th> -->
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Short Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($scams as $scam)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $scam->sort_order }}
                    </td>
                    <!-- <td class="px-6 py-4 whitespace-nowrap">
                        @if($scam->featuredMedia)
                        <img src="{{ $scam->featuredMedia->url }}" alt="{{ $scam->title_en }}" class="h-12 w-12 object-cover rounded-lg">
                        @else
                        <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-image text-gray-400"></i>
                        </div>
                        @endif
                    </td> -->
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900 text-wrap">{{ $scam->title_en }}</div>
                        @if($scam->title_kn)
                        <div class="text-sm text-gray-500 text-wrap">{{ $scam->title_kn }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-500 text-wrap">{{ Str::limit($scam->short_description_en, 60) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $scam->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($scam->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('admin.scams-exposed.edit', $scam) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button onclick="confirmDelete({{ $scam->id }})" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-exclamation-triangle text-4xl mb-4 text-gray-300"></i>
                        <p>No scams exposed found</p>
                        <a href="{{ route('admin.scams-exposed.create') }}" class="text-primary hover:text-primary/80 mt-2 inline-block">
                            Add your first scam exposure
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($scams->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $scams->links() }}
    </div>
    @endif
</div>

<!-- Delete Form -->
<form id="deleteForm" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this scam exposure?')) {
        const form = document.getElementById('deleteForm');
        form.action = `/admin/scams-exposed/${id}`;
        form.submit();
    }
}
</script>
@endpush
