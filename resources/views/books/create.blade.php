@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="bg-white rounded-xl shadow p-6">
  <h1 class="text-xl font-bold mb-6">Tambah Buku Baru</h1>

  <!-- action → store(), method POST, @csrf wajib! -->
  <form action="{{ route('books.store') }}"
        method="POST"
        class="space-y-4">

    @csrf <!-- WAJIB: token keamanan -->

    <!-- Field: Judul -->
    <div>
      <label class="block text-sm font-medium">Judul Buku</label>
      <input type="text" name="title"
             value="{{ old('title') }}"
             class="mt-1 w-full border rounded-lg px-3 py-2
                    @error('title') border-red-400 bg-red-50 @enderror">

      <!-- Tampilkan pesan error field title -->
      @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Field: Penulis -->
    <div>
      <label class="block text-sm font-medium">Penulis</label>
      <input type="text" name="author"
             value="{{ old('author') }}"
             class="mt-1 w-full border rounded-lg px-3 py-2
                    @error('author') border-red-400 bg-red-50 @enderror">
      @error('author')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Field: ISBN dan Harga (2 kolom) -->
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-medium">ISBN</label>
        <input type="text" name="isbn"
               value="{{ old('isbn') }}"
               class="mt-1 w-full border rounded-lg px-3 py-2
                      @error('isbn') border-red-400 bg-red-50 @enderror">
        @error('isbn')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label class="block text-sm font-medium">Harga (Rp)</label>
        <input type="number" name="price"
               value="{{ old('price') }}"
               class="mt-1 w-full border rounded-lg px-3 py-2
                      @error('price') border-red-400 bg-red-50 @enderror">
        @error('price')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <!-- Field: Stok -->
    <div>
      <label class="block text-sm font-medium">Stok</label>
      <input type="number" name="stock"
             value="{{ old('stock', 0) }}" min="0"
             class="mt-1 w-full border rounded-lg px-3 py-2
                    @error('stock') border-red-400 bg-red-50 @enderror">
      @error('stock')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Field: Deskripsi (nullable / opsional) -->
    <div>
      <label class="block text-sm font-medium">Deskripsi <span class="text-gray-400">(opsional)</span></label>
      <textarea name="description" rows="3"
                class="mt-1 w-full border rounded-lg px-3 py-2
                       @error('description') border-red-400 bg-red-50 @enderror">{{ old('description') }}</textarea>
      @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Tombol Submit -->
    <div class="flex gap-3 pt-2">
      <button type="submit"
              class="bg-indigo-600 text-white px-6 py-2 rounded-lg">
        Simpan Buku
      </button>
      <a href="{{ route('books.index') }}"
         class="border px-6 py-2 rounded-lg">Batal</a>
    </div>
  </form>
</div>
@endsection