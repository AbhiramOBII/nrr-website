@extends('admin.layouts.app')

@section('title', 'Manage Paper Clips')
@section('page-title', 'Manage Paper Clips')
@section('page-description', 'Manage document attachments and downloadable resources')

@section('content')
<div class="space-y-6">
    <!-- Upload New Paper Clip -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Upload New Document</h3>
        </div>
        <div class="p-6">
            <form class="space-y-4">
                <div>
                    <label for="document_file" class="block text-sm font-medium text-gray-700">Document File</label>
                    <input type="file" id="document_file" name="document_file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/80">
                    <p class="mt-1 text-sm text-gray-500">Supported formats: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, TXT</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="document_title" class="block text-sm font-medium text-gray-700">Document Title</label>
                        <input type="text" id="document_title" name="document_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter document title">
                    </div>
                    <div>
                        <label for="document_category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="document_category" name="document_category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                            <option value="">Select Category</option>
                            <option value="reports">Reports</option>
                            <option value="policies">Policies</option>
                            <option value="forms">Forms</option>
                            <option value="newsletters">Newsletters</option>
                            <option value="presentations">Presentations</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="document_description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="document_description" name="document_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter document description"></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="document_access" class="block text-sm font-medium text-gray-700">Access Level</label>
                        <select id="document_access" name="document_access" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                            <option value="public">Public</option>
                            <option value="members">Members Only</option>
                            <option value="admin">Admin Only</option>
                        </select>
                    </div>
                    <div>
                        <label for="document_featured" class="block text-sm font-medium text-gray-700">Featured Document</label>
                        <select id="document_featured" name="document_featured" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Upload Document
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Document Library -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-medium text-gray-900">Document Library</h3>
            <div class="flex space-x-2">
                <select class="rounded-md border-gray-300 text-sm">
                    <option value="">All Categories</option>
                    <option value="reports">Reports</option>
                    <option value="policies">Policies</option>
                    <option value="forms">Forms</option>
                    <option value="newsletters">Newsletters</option>
                    <option value="presentations">Presentations</option>
                    <option value="other">Other</option>
                </select>
                <input type="search" placeholder="Search documents..." class="rounded-md border-gray-300 text-sm">
            </div>
        </div>
        <div class="p-6">
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-paperclip text-4xl mb-4"></i>
                <p>No documents found. Upload your first document above.</p>
            </div>
        </div>
    </div>
</div>
@endsection
