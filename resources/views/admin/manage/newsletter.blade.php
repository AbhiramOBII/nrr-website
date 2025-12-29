@extends('admin.layouts.app')

@section('title', 'Manage Newsletter Subscription')
@section('page-title', 'Manage Newsletter Subscription')
@section('page-description', 'Manage newsletter subscribers and email campaigns')

@section('content')
<div class="space-y-6">
    <!-- Subscriber Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                            <i class="fas fa-users text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Subscribers</dt>
                            <dd class="text-lg font-medium text-gray-900">0</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                            <i class="fas fa-user-plus text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Active</dt>
                            <dd class="text-lg font-medium text-gray-900">0</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-500 rounded-md flex items-center justify-center">
                            <i class="fas fa-envelope text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Campaigns Sent</dt>
                            <dd class="text-lg font-medium text-gray-900">0</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-purple-500 rounded-md flex items-center justify-center">
                            <i class="fas fa-chart-line text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Open Rate</dt>
                            <dd class="text-lg font-medium text-gray-900">0%</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Newsletter Campaign -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Create Newsletter Campaign</h3>
        </div>
        <div class="p-6">
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="campaign_name" class="block text-sm font-medium text-gray-700">Campaign Name</label>
                        <input type="text" id="campaign_name" name="campaign_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter campaign name">
                    </div>
                    <div>
                        <label for="campaign_subject" class="block text-sm font-medium text-gray-700">Email Subject</label>
                        <input type="text" id="campaign_subject" name="campaign_subject" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter email subject">
                    </div>
                </div>
                <div>
                    <label for="campaign_content" class="block text-sm font-medium text-gray-700">Email Content</label>
                    <textarea id="campaign_content" name="campaign_content" rows="8" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter newsletter content"></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="campaign_schedule" class="block text-sm font-medium text-gray-700">Send Schedule</label>
                        <select id="campaign_schedule" name="campaign_schedule" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                            <option value="now">Send Now</option>
                            <option value="scheduled">Schedule for Later</option>
                            <option value="draft">Save as Draft</option>
                        </select>
                    </div>
                    <div>
                        <label for="campaign_date" class="block text-sm font-medium text-gray-700">Schedule Date & Time</label>
                        <input type="datetime-local" id="campaign_date" name="campaign_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                    </div>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Save Draft
                    </button>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Create Campaign
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Subscribers List -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-medium text-gray-900">Newsletter Subscribers</h3>
            <div class="flex space-x-2">
                <select class="rounded-md border-gray-300 text-sm">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="unsubscribed">Unsubscribed</option>
                </select>
                <input type="search" placeholder="Search subscribers..." class="rounded-md border-gray-300 text-sm">
                <button class="bg-primary text-white px-3 py-1 rounded-md text-sm hover:bg-primary/80">
                    Export CSV
                </button>
            </div>
        </div>
        <div class="p-6">
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-newspaper text-4xl mb-4"></i>
                <p>No subscribers found. Subscribers will appear here when users sign up for the newsletter.</p>
            </div>
        </div>
    </div>

    <!-- Campaign History -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Campaign History</h3>
        </div>
        <div class="p-6">
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-history text-4xl mb-4"></i>
                <p>No campaigns sent yet. Your newsletter campaigns will appear here after sending.</p>
            </div>
        </div>
    </div>
</div>
@endsection
