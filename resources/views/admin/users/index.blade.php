<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Akun Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-6">
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
                    <h3 class="text-lg font-bold">Daftar Pengguna</h3>
                    <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2.5 rounded-lg font-bold hover:bg-blue-700 text-sm w-full sm:w-auto text-center">+ Tambah Akun</a>
                </div>

                {{-- Desktop Table --}}
                <div class="hidden sm:block overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border-b p-3 text-sm">Nama</th>
                                <th class="border-b p-3 text-sm">Email</th>
                                <th class="border-b p-3 text-sm">Role</th>
                                <th class="border-b p-3 text-sm">Tanggal Daftar</th>
                                <th class="border-b p-3 text-right text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="p-3">{{ $user->name }}</td>
                                    <td class="p-3 text-sm">{{ $user->email }}</td>
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
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 font-semibold text-sm">Edit</a>
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block m-0" onsubmit="return confirm('Yakin ingin menghapus akun ini? Akun yang dihapus tidak dapat dikembalikan.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold text-sm">Hapus</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Mobile Card View --}}
                <div class="sm:hidden space-y-3">
                    @foreach ($users as $user)
                        <div class="border border-gray-200 rounded-lg p-4 space-y-3">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-bold text-slate-800">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">{{ $user->email }}</p>
                                </div>
                                <span class="px-2 py-1 text-[10px] rounded uppercase font-bold flex-shrink-0
                                    @if($user->role === 'admin') bg-red-100 text-red-800 
                                    @elseif($user->role === 'instructor') bg-purple-100 text-purple-800 
                                    @else bg-green-100 text-green-800 @endif">
                                    {{ $user->role }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                <span class="text-xs text-gray-400">{{ $user->created_at->format('d M Y') }}</span>
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 font-semibold text-sm">Edit</a>
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block m-0" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 font-semibold text-sm">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
