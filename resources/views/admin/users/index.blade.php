<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Akun Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold">Daftar Pengguna</h3>
                    <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700">+ Tambah Akun</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border-b p-3">Nama</th>
                                <th class="border-b p-3">Email</th>
                                <th class="border-b p-3">Role</th>
                                <th class="border-b p-3">Tanggal Daftar</th>
                                <th class="border-b p-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="p-3">{{ $user->name }}</td>
                                    <td class="p-3">{{ $user->email }}</td>
                                    <td class="p-3">
                                        <span class="px-2 py-1 text-xs rounded uppercase font-bold 
                                            @if($user->role === 'admin') bg-red-100 text-red-800 
                                            @elseif($user->role === 'instructor') bg-purple-100 text-purple-800 
                                            @else bg-green-100 text-green-800 @endif">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="p-3 text-sm text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                                    <td class="p-3 text-right space-x-2">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 font-semibold">Edit</a>
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block m-0" onsubmit="return confirm('Yakin ingin menghapus akun ini? Akun yang dihapus tidak dapat dikembalikan.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Hapus</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
