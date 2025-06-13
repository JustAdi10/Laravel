<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Social Auth Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">
                🔐 Laravel Social Authentication Demo
            </h1>

            <!-- Authentication Status -->
            <div class="mb-8 p-6 rounded-lg {{ auth()->check() ? 'bg-green-50 border border-green-200' : 'bg-blue-50 border border-blue-200' }}">
                <h2 class="text-xl font-semibold mb-4 {{ auth()->check() ? 'text-green-800' : 'text-blue-800' }}">
                    Authentication Status
                </h2>
                
                @auth
                    <div class="space-y-2">
                        <p class="text-green-700">✅ <strong>Authenticated</strong></p>
                        <p class="text-gray-700"><strong>Name:</strong> {{ auth()->user()->name }}</p>
                        <p class="text-gray-700"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        @if(auth()->user()->provider)
                            <p class="text-gray-700"><strong>Login Method:</strong> {{ ucfirst(auth()->user()->provider) }} Social Login</p>
                            @if(auth()->user()->avatar)
                                <div class="flex items-center space-x-2">
                                    <span class="text-gray-700"><strong>Avatar:</strong></span>
                                    <img src="{{ auth()->user()->avatar }}" alt="Avatar" class="w-8 h-8 rounded-full">
                                </div>
                            @endif
                        @else
                            <p class="text-gray-700"><strong>Login Method:</strong> Traditional Email/Password</p>
                        @endif
                    </div>
                @else
                    <p class="text-blue-700">❌ <strong>Not Authenticated</strong></p>
                @endauth
            </div>

            <!-- Available Authentication Methods -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Available Authentication Methods</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Traditional Auth -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-800 mb-3">📧 Traditional Authentication</h3>
                        <ul class="space-y-2 text-gray-600 mb-4">
                            <li>• Email/Password Registration</li>
                            <li>• Email/Password Login</li>
                            <li>• Password Reset</li>
                            <li>• Remember Me</li>
                        </ul>
                        <div class="space-x-2">
                            @guest
                                <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</a>
                                <a href="{{ route('register') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Register</a>
                            @endguest
                        </div>
                    </div>

                    <!-- Social Auth -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-800 mb-3">🌐 Social Authentication</h3>
                        <ul class="space-y-2 text-gray-600 mb-4">
                            <li>• Google OAuth</li>
                            <li>• GitHub OAuth</li>
                            <li>• Facebook OAuth</li>
                            <li>• Automatic Account Creation</li>
                        </ul>
                        @guest
                            <div class="space-y-2">
                                <a href="{{ route('social.redirect', 'google') }}" class="block w-full text-center bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Login with Google</a>
                                <a href="{{ route('social.redirect', 'github') }}" class="block w-full text-center bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900">Login with GitHub</a>
                                <a href="{{ route('social.redirect', 'facebook') }}" class="block w-full text-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login with Facebook</a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">🚀 Features Implemented</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                        <h4 class="font-medium text-green-800">✅ Laravel Breeze</h4>
                        <p class="text-sm text-green-600">Complete auth scaffolding</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                        <h4 class="font-medium text-green-800">✅ Laravel Socialite</h4>
                        <p class="text-sm text-green-600">Social OAuth integration</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                        <h4 class="font-medium text-green-800">✅ Responsive Design</h4>
                        <p class="text-sm text-green-600">Mobile-friendly UI</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                        <h4 class="font-medium text-green-800">✅ Database Integration</h4>
                        <p class="text-sm text-green-600">User data persistence</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                        <h4 class="font-medium text-green-800">✅ Security Features</h4>
                        <p class="text-sm text-green-600">CSRF, validation, hashing</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                        <h4 class="font-medium text-green-800">✅ Profile Management</h4>
                        <p class="text-sm text-green-600">User profile editing</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="text-center space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Go to Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Try Authentication</a>
                @endauth
            </div>

            <!-- Setup Instructions -->
            <div class="mt-8 p-6 bg-yellow-50 border border-yellow-200 rounded-lg">
                <h3 class="text-lg font-medium text-yellow-800 mb-2">⚠️ Setup Required for Social Auth</h3>
                <p class="text-yellow-700 text-sm">
                    To enable social authentication, you need to configure OAuth applications with Google, GitHub, and Facebook, 
                    then update your <code class="bg-yellow-100 px-1 rounded">.env</code> file with the client credentials.
                    See the README.md for detailed setup instructions.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
