@extends('admin.layouts.app')

@section('title', 'Manage Impact Numbers')
@section('page-title', 'Manage Impact Numbers')
@section('page-description', 'Manage statistical impact numbers displayed on the homepage')

@section('content')
<div class="space-y-6">
    <!-- Add New Impact Number -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Add New Impact Number</h3>
        </div>
        <div class="p-6">
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="impact_number" class="block text-sm font-medium text-gray-700">Number</label>
                        <input type="number" id="impact_number" name="impact_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="e.g., 1000">
                    </div>
                    <div>
                        <label for="impact_suffix" class="block text-sm font-medium text-gray-700">Suffix</label>
                        <input type="text" id="impact_suffix" name="impact_suffix" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="e.g., +, K, M">
                    </div>
                    <div>
                        <label for="impact_icon" class="block text-sm font-medium text-gray-700">Icon Class</label>
                        <input type="text" id="impact_icon" name="impact_icon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="e.g., fas fa-users">
                    </div>
                </div>
                <div>
                    <label for="impact_label" class="block text-sm font-medium text-gray-700">Label</label>
                    <input type="text" id="impact_label" name="impact_label" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="e.g., People Helped">
                </div>
                <div>
                    <label for="impact_description" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea id="impact_description" name="impact_description" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Brief description of this impact metric"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Add Impact Number
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Current Impact Numbers -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Current Impact Numbers</h3>
        </div>
        <div class="p-6">
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-chart-bar text-4xl mb-4"></i>
                <p>No impact numbers found. Add your first impact metric above.</p>
            </div>
        </div>
    </div>
</div>
@endsection
