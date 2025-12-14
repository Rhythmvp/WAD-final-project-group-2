@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-3xl font-serif mb-6">Edit User</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Name</label>
                <input type="text" 
                       name="name" 
                       value="{{ old('name', $user->name) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c4d5b8] @error('name') border-red-500 @enderror"
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" 
                       name="email" 
                       value="{{ old('email', $user->email) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c4d5b8] @error('email') border-red-500 @enderror"
                       required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Password (leave blank to keep current)</label>
                <input type="password" 
                       name="password" 
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c4d5b8] @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Role</label>
                <select name="role" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c4d5b8]"
                        required>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" 
                           name="is_active" 
                           value="1" 
                           {{ $user->is_active ? 'checked' : '' }} 
                           class="mr-2">
                    <span class="text-gray-700">Active</span>
                </label>
            </div>

            <div class="flex gap-4">
                <button type="submit" 
                        class="px-6 py-2 bg-[#c4d5b8] hover:bg-[#b0c5a4] rounded-full transition">
                    Update User
                </button>
                <a href="{{ route('admin.users.index') }}" 
                   class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-full transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection