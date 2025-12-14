@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-serif">User Management</h1>
        <a href="{{ route('admin.users.create') }}" 
           class="px-6 py-2 bg-[#c4d5b8] hover:bg-[#b0c5a4] rounded-full transition">
            Add New User
        </a>
    </div>

    @if(session('success'))
        <div class="bg-[#c4d5b8] text-gray-800 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-[#c4d5b8]">
                <tr>
                    <th class="px-6 py-3 text-left font-medium">Name</th>
                    <th class="px-6 py-3 text-left font-medium">Email</th>
                    <th class="px-6 py-3 text-left font-medium">Role</th>
                    <th class="px-6 py-3 text-left font-medium">Status</th>
                    <th class="px-6 py-3 text-left font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-sm {{ $user->role === 'admin' ? 'bg-[#5a6c4f] text-white' : 'bg-gray-200' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-sm {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.users.edit', $user) }}" 
                               class="text-blue-600 hover:text-blue-800">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
@endsection