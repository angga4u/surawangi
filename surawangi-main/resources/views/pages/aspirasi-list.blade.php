@extends('layouts.app')

@section('title', 'Daftar Aspirasi Masyarakat')

@section('content')

<x-navbar />

<main class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 py-12">
    <div class="max-w-7xl mx-auto px-4">

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg mb-6 shadow-sm">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        {{-- Notifikasi Error --}}
        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg mb-6 shadow-sm">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        {{-- Header Section --}}
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">Daftar Aspirasi Masyarakat</h1>
                    <p class="text-gray-600">Pantau dan lihat semua aspirasi yang telah disampaikan</p>
                </div>
                <a
                    href="{{ route('aspirasi.index') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition transform hover:scale-105 flex items-center justify-center"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Kirim Aspirasi Baru
                </a>
            </div>
        </div>

        {{-- Filter & Stats --}}
        <div class="grid md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="bg-blue-100 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Aspirasi</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $data->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="bg-green-100 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Hari Ini</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $data->where('created_at', '>=', now()->startOfDay())->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="bg-yellow-100 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Minggu Ini</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $data->where('created_at', '>=', now()->startOfWeek())->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-5">
                <div class="flex items-center">
                    <div class="bg-purple-100 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Bulan Ini</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $data->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table Aspirasi --}}
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">

            {{-- Search & Filter Bar --}}
            <div class="p-6 bg-gray-50 border-b">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex-1">
                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Cari aspirasi berdasarkan nama, email, atau isi..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Kategori</option>
                        <option value="Infrastruktur">Infrastruktur</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Lingkungan">Lingkungan</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Nama</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Kontak</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Kategori</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Ditujukan Kepada</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Aspirasi</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Tanggal</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200" id="aspirasiTable">
                        @forelse ($data as $index => $aspirasi)
                            <tr class="hover:bg-blue-50 transition duration-150">
                                <td class="px-6 py-4 text-gray-700 font-medium">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-800">{{ $aspirasi->nama }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-600">{{ $aspirasi->email }}</div>
                                    @if(isset($aspirasi->telepon))
                                        <div class="text-xs text-gray-500">{{ $aspirasi->telepon }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full
                                        {{ $aspirasi->kategori == 'Infrastruktur' ? 'bg-blue-100 text-blue-700' : '' }}
                                        {{ $aspirasi->kategori == 'Pendidikan' ? 'bg-green-100 text-green-700' : '' }}
                                        {{ $aspirasi->kategori == 'Kesehatan' ? 'bg-red-100 text-red-700' : '' }}
                                        {{ $aspirasi->kategori == 'Lingkungan' ? 'bg-emerald-100 text-emerald-700' : '' }}
                                        {{ $aspirasi->kategori == 'Ekonomi' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                        {{ !in_array($aspirasi->kategori, ['Infrastruktur', 'Pendidikan', 'Kesehatan', 'Lingkungan', 'Ekonomi']) ? 'bg-gray-100 text-gray-700' : '' }}
                                    ">
                                        {{ $aspirasi->kategori ?? 'Umum' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-700">
                                        {{ $aspirasi->tujuan ?? '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-700 max-w-md">
                                        <p class="line-clamp-2">{{ $aspirasi->pesan }}</p>
                                        <button
                                            onclick="showModal({{ $aspirasi->id }})"
                                            class="text-blue-600 hover:text-blue-700 text-xs mt-1 font-medium flex items-center"
                                        >
                                            Baca selengkapnya →
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                    <div>{{ $aspirasi->created_at->format('d M Y') }}</div>
                                    <div class="text-xs text-gray-500">{{ $aspirasi->created_at->format('H:i') }}</div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <form action="{{ route('aspirasi.destroy', $aspirasi->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus aspirasi dari {{ $aspirasi->nama }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition transform hover:scale-105 flex items-center justify-center mx-auto">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                        </svg>
                                        <p class="text-gray-600 text-lg font-medium">Belum ada aspirasi yang masuk</p>
                                        <p class="text-gray-500 text-sm mt-1">Jadilah yang pertama menyampaikan aspirasi</p>
                                        <a
                                            href="{{ route('aspirasi.index') }}"
                                            class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition"
                                        >
                                            Kirim Aspirasi
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination Info --}}
            @if($data->count() > 0)
                <div class="px-6 py-4 bg-gray-50 border-t">
                    <p class="text-sm text-gray-600">
                        Menampilkan <span class="font-semibold">{{ $data->count() }}</span> aspirasi
                    </p>
                </div>
            @endif
        </div>

    </div>
</main>

<x-footer />

{{-- Modal Detail Aspirasi --}}
<div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-hidden">
        {{-- Header Modal --}}
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-4 flex justify-between items-center">
            <h3 class="text-xl font-bold">Detail Aspirasi</h3>
            <button onclick="closeModal()" class="text-white hover:text-gray-200 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Content Modal --}}
        <div class="p-6 overflow-y-auto max-h-[calc(90vh-80px)]">
            <div class="space-y-4">
                {{-- Info Pengirim --}}
                <div class="bg-blue-50 rounded-lg p-4">
                    <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        Informasi Pengirim
                    </h4>
                    <div class="grid md:grid-cols-2 gap-3">
                        <div>
                            <p class="text-xs text-gray-600">Nama Lengkap</p>
                            <p class="font-semibold text-gray-800" id="modal-nama">-</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-600">Email</p>
                            <p class="font-semibold text-gray-800" id="modal-email">-</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-600">No. Telepon</p>
                            <p class="font-semibold text-gray-800" id="modal-telepon">-</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-600">Tanggal Kirim</p>
                            <p class="font-semibold text-gray-800" id="modal-tanggal">-</p>
                        </div>
                    </div>
                </div>

                {{-- Kategori & Tujuan --}}
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="border rounded-lg p-4">
                        <p class="text-xs text-gray-600 mb-1">Kategori</p>
                        <span id="modal-kategori-badge" class="inline-block px-3 py-1 text-sm font-medium rounded-full bg-blue-100 text-blue-700">
                            -
                        </span>
                    </div>
                    <div class="border rounded-lg p-4">
                        <p class="text-xs text-gray-600 mb-1">Ditujukan Kepada</p>
                        <p class="font-semibold text-gray-800" id="modal-tujuan">-</p>
                    </div>
                </div>

                {{-- Isi Aspirasi --}}
                <div class="border rounded-lg p-4">
                    <h4 class="font-semibold text-gray-800 mb-2 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Isi Aspirasi
                    </h4>
                    <div class="bg-gray-50 rounded p-4">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line" id="modal-pesan">-</p>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end gap-3 pt-4 border-t">
                    <button onclick="closeModal()" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        Tutup
                    </button>
                    <form id="modal-delete-form" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition flex items-center" onclick="return confirm('Yakin ingin menghapus aspirasi ini?')">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus Aspirasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script>
// Data aspirasi untuk modal
const aspirasiData = @json($data);

// Simple Search Filter
document.getElementById('searchInput')?.addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('#aspirasiTable tr');

    tableRows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
    });
});

// Show Modal
function showModal(id) {
    const aspirasi = aspirasiData.find(item => item.id === id);
    if (!aspirasi) return;

    // Set data ke modal
    document.getElementById('modal-nama').textContent = aspirasi.nama;
    document.getElementById('modal-email').textContent = aspirasi.email;
    document.getElementById('modal-telepon').textContent = aspirasi.telepon || '-';
    document.getElementById('modal-tujuan').textContent = aspirasi.tujuan || '-';
    document.getElementById('modal-pesan').textContent = aspirasi.pesan;

    // Format tanggal
    const date = new Date(aspirasi.created_at);
    const formattedDate = date.toLocaleDateString('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
    document.getElementById('modal-tanggal').textContent = formattedDate;

    // Set kategori dengan badge warna
    const kategoriEl = document.getElementById('modal-kategori-badge');
    kategoriEl.textContent = aspirasi.kategori || 'Umum';

    // Set warna badge sesuai kategori
    const kategoriColors = {
        'Infrastruktur': 'bg-blue-100 text-blue-700',
        'Pendidikan': 'bg-green-100 text-green-700',
        'Kesehatan': 'bg-red-100 text-red-700',
        'Lingkungan': 'bg-emerald-100 text-emerald-700',
        'Ekonomi': 'bg-yellow-100 text-yellow-700',
        'Keamanan': 'bg-purple-100 text-purple-700'
    };

    kategoriEl.className = 'inline-block px-3 py-1 text-sm font-medium rounded-full ' +
        (kategoriColors[aspirasi.kategori] || 'bg-gray-100 text-gray-700');

    // Set form action untuk delete
    document.getElementById('modal-delete-form').action = '/aspirasi/' + aspirasi.id;

    // Show modal
    document.getElementById('detailModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

// Close Modal
function closeModal() {
    document.getElementById('detailModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal saat klik di luar
document.getElementById('detailModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal dengan ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>

@endsection
