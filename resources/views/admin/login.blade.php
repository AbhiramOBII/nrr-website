<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - N. R. Ramesh</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Left Side - Branding -->
                    <div class="bg-gradient-to-br from-primary to-header-orange p-8 lg:p-12 flex items-center justify-center relative">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <div class="w-full h-full" style="background-image: radial-gradient(circle at 25px 25px, white 2px, transparent 0), radial-gradient(circle at 75px 75px, white 2px, transparent 0); background-size: 100px 100px;"></div>
                        </div>
                        
                        <div class="text-center text-white relative z-10">
                            <!-- Profile Image -->
                            <div class="mb-8">
                                <div class="w-32 h-32 mx-auto rounded-full bg-header-orange p-1">
                                    <div class="w-full h-full rounded-full bg-white flex items-center justify-center overflow-hidden">
                                        <img src="{{ asset('image/logo-NRR.webp') }}" alt="N. R. Ramesh" class="w-24 h-24 object-cover rounded-full">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Brand Text -->
                            <div class="bg-primary/90 rounded-full px-8 py-3 inline-block mb-6">
                                <h1 class="text-xl font-bold text-white">N R RAMESH OFFICIAL</h1>
                                <p class="text-sm text-white/90">ನಮ್ಮ ಭವಿಷ್ಯ ಸುವಿಸ್</p>
                            </div>
                            
                            <!-- Setup Text -->
                            <p class="text-white/80 text-sm">Setup Logo Here</p>
                        </div>
                    </div>
                    
                    <!-- Right Side - Login Form -->
                    <div class="p-8 lg:p-12">
                        <!-- Admin Badge -->
                        <div class="text-right mb-6">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-primary text-white">
                                <i class="fas fa-shield-alt mr-1"></i>
                                ADMIN LOGIN
                            </span>
                        </div>
                        
                        
                        <!-- Flash Messages -->
                        @if(session('success'))
                        <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4">
                            <div class="flex">
                                <i class="fas fa-check-circle text-green-400 mr-3 mt-0.5"></i>
                                <p class="text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>
                        @endif
                        
                        @if(session('error'))
                        <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4">
                            <div class="flex">
                                <i class="fas fa-exclamation-circle text-red-400 mr-3 mt-0.5"></i>
                                <p class="text-red-700">{{ session('error') }}</p>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Login Form -->
                        <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <!-- Email Field -->
                            <div class="space-y-2 mb-4">
                                <input id="email" 
                                       name="email" 
                                       type="email" 
                                       autocomplete="email" 
                                       required 
                                       value="{{ old('email') }}"
                                       class="block w-full px-4 py-4 mx-2 border border-gray-300 rounded-lg bg-gray-50 placeholder-gray-400 text-gray-900 focus:outline-none focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all duration-200 @error('email') border-red-400 bg-red-50 focus:border-red-400 focus:ring-red-100 @enderror"
                                       placeholder="Email Address">
                                @error('email')
                                    <p class="text-xs text-red-600 ml-3">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Password Field -->
                            <div class="space-y-2 mb-4">
                                <input id="password" 
                                       name="password" 
                                       type="password" 
                                       autocomplete="current-password" 
                                       required
                                       class="block w-full px-4 py-4 mx-2 border border-gray-300 rounded-lg bg-gray-50 placeholder-gray-400 text-gray-900 focus:outline-none focus:bg-white focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all duration-200 @error('password') border-red-400 bg-red-50 focus:border-red-400 focus:ring-red-100 @enderror"
                                       placeholder="Password">
                                @error('password')
                                    <p class="text-xs text-red-600 ml-3">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Remember Me -->
                            <div class="flex items-center py-2">
                                <input id="remember" 
                                       name="remember" 
                                       type="checkbox" 
                                       class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                <label for="remember" class="ml-3 text-sm text-gray-600">
                                    Remember me
                                </label>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="pt-2">
                                <button type="submit" 
                                        class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-4 px-6 rounded-lg shadow-sm hover:shadow-md transform hover:scale-[1.01] active:scale-[0.99] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                    Login
                                </button>
                            </div>
                            
                            <!-- Forgot Password -->
                            <div class="text-center pt-4">
                                <a href="#" class="text-sm text-primary hover:text-primary/80 font-medium transition duration-150 ease-in-out">
                                    Forgot Password?
                                </a>
                            </div>
                        </form>
                        
                        <!-- Footer Links -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <a href="{{ url('/') }}" class="flex items-center hover:text-primary transition duration-150 ease-in-out">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Back to Website
                                </a>
                                <span>{{ date('Y') }} N. R. Ramesh</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
