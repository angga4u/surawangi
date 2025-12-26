@extends('layouts.app')

@section('title', 'Aspirasi Masyarakat')

@section('content')

<x-navbar />

<main class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-50 py-12">
    <div class="max-w-5xl mx-auto px-4">

        {{-- Header Section --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-3">Aspirasi Masyarakat</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Sampaikan aspirasi, keluhan, atau saran Anda kepada pihak terkait.
                Suara Anda adalah bagian penting dalam pembangunan daerah.
            </p>
        </div>

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

        <div class="grid md:grid-cols-3 gap-6">

            {{-- Form Aspirasi --}}
            <div class="md:col-span-2">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <svg class="w-7 h-7 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                        </svg>
                        Kirim Aspirasi
                    </h2>

                    <form action="{{ route('aspirasi.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    name="nama"
                                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="email"
                                    name="email"
                                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                    placeholder="email@example.com"
                                    required
                                >
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    No. Telepon
                                </label>
                                <input
                                    type="tel"
                                    name="telepon"
                                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                    placeholder="08xxxxxxxxxx"
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Kategori Aspirasi <span class="text-red-500">*</span>
                                </label>
                                <select
                                    name="kategori"
                                    class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                    required
                                >
                                    <option value="">Pilih Kategori</option>
                                    <option value="Infrastruktur">Infrastruktur</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Lingkungan">Lingkungan</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Keamanan">Keamanan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Ditujukan Kepada <span class="text-red-500">*</span>
                            </label>
                            <select
                                name="tujuan"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                required
                            >
                                <option value="">Pilih Tujuan</option>
                                <option value="Kepala Daerah">Ketua DPRD</option>
                                <option value="Dinas Pekerjaan Umum">Fraksi</option>
                                <option value="Dinas Pendidikan">Bagian Umum</option>
                                <option value="Dinas Kesehatan">Perencanaan dan Keuangan</option>
                                <option value="Dinas Lingkungan Hidup">Persidangan dan Perundangan</option>
                                <option value="Dinas Sosial">Komisi 1</option>
                                <option value="Kepolisian">Komisi 2</option>
                                <option value="Kelurahan/Desa">Komisi 3</option>
                                <option value="Lainnya">Komisi 4</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Isi Aspirasi <span class="text-red-500">*</span>
                            </label>
                            <textarea
                                name="pesan"
                                rows="6"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                                placeholder="Tuliskan aspirasi, keluhan, atau saran Anda secara detail..."
                                required
                            ></textarea>
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <a
                                href="{{ route('aspirasi.list') }}"
                                class="text-blue-600 hover:text-blue-700 font-medium flex items-center transition"
                            >
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Lihat Daftar Aspirasi
                            </a>

                            <button
                                type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition transform hover:scale-105 flex items-center"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                                Kirim Aspirasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Info Sidebar --}}
            <div class="space-y-6">
                {{-- Statistik --}}
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                        Statistik
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Aspirasi</span>
                            <span class="font-bold text-xl text-blue-600">{{ $aspirasis->count() }}</span>
                        </div>
                    </div>
                </div>

                {{-- Panduan --}}
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="font-bold mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        Panduan Pengisian
                    </h3>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start">
                            <span class="mr-2">•</span>
                            <span>Isi data dengan lengkap dan jelas</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">•</span>
                            <span>Pilih kategori dan tujuan yang sesuai</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">•</span>
                            <span>Sampaikan aspirasi secara sopan dan konstruktif</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">•</span>
                            <span>Aspirasi akan ditindaklanjuti sesuai prosedur</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        {{-- Aspirasi Terbaru (Preview) --}}
        <div class="mt-10">
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Aspirasi Terbaru</h2>
                    <a
                        href="{{ route('aspirasi.list') }}"
                        class="text-blue-600 hover:text-blue-700 font-medium flex items-center transition"
                    >
                        Lihat Semua
                        <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($aspirasis->take(3) as $asp)
                        <div class="border border-gray-200 rounded-lg p-5 hover:shadow-md transition">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-gray-800">{{ $asp->nama }}</h3>
                                <span class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                                    {{ $asp->kategori ?? 'Umum' }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-500 mb-2">{{ $asp->email }}</p>
                            @if(isset($asp->tujuan))
                                <p class="text-xs text-gray-600 mb-2">
                                    <span class="font-semibold">Ditujukan ke:</span> {{ $asp->tujuan }}
                                </p>
                            @endif
                            <p class="text-gray-700 line-clamp-2">{{ $asp->pesan }}</p>
                        </div>
                    @empty
                        <div class="text-center py-8 text-gray-500">
                            <svg class="w-16 h-16 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p>Belum ada aspirasi yang masuk</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</main>

<x-footer />

@endsection
