@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="bg-white rounded-xl shadow p-6">

  <!-- Header halaman -->
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-bold">📚 Daftar Buku</h1>
    <a href="{{ route('books.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
      + Tambah Buku
    </a>
  </div>

  <!-- Tabel buku -->
  <table class="w-full text-sm">
    <thead class="bg-gray-50 text-left">
      <tr>
        <th class="px-4 py-3 font-semibold">#</th>
        <th class="px-4 py-3 font-semibold">Judul</th>
        <th class="px-4 py-3 font-semibold">Penulis</th>
        <th class="px-4 py-3 font-semibold">ISBN</th>
        <th class="px-4 py-3 font-semibold">Harga</th>
        <th class="px-4 py-3 font-semibold">Stok</th>
        <th class="px-4 py-3 font-semibold text-center">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">

      <!-- Jika tidak ada buku -->
      @forelse ($books as $book)
      <tr class="hover:bg-gray-50">
        <td class="px-4 py-3 text-gray-400">{{ $loop->iteration }}</td>
        <td class="px-4 py-3 font-medium">{{ $book->title }}</td>
        <td class="px-4 py-3 text-gray-600">{{ $book->author }}</td>
        <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $book->isbn }}</td>
        <td class="px-4 py-3">Rp {{ number_format($book->price, 0, ',', '.') }}</td>
        <td class="px-4 py-3">{{ $book->stock }}</td>
        <td class="px-4 py-3 text-center">
          <!-- Tombol Edit -->
          <a href="{{ route('books.edit', $book) }}"
             class="text-indigo-600 hover:underline mr-3 text-sm">Edit</a>

          <!-- Form Hapus (DELETE dengan method spoofing) -->
          <form action="{{ route('books.destroy', $book) }}"
                method="POST"
                class="inline"
                onsubmit="return confirm('Yakin hapus buku ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="text-red-500 hover:underline text-sm">Hapus</button>
          </form>
        </td>
      </tr>

      @empty
      <tr>
        <td colspan="7" class="px-4 py-8 text-center text-gray-400">
          Belum ada buku. <a href="{{ route('books.create') }}"
          class="text-indigo-600 hover:underline">Tambah sekarang →</a>
        </td>
      </tr>
      @endforelse

    </tbody>
  </table>

  <!-- Pagination -->
  <div class="mt-4">
    {{ $books->links() }}
  </div>

</div>
@endsection