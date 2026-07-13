<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Produk</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">

    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="mb-1 text-sm font-semibold uppercase tracking-wider text-blue-600">
                    Manajemen Produk
                </p>

                <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                    Data Produk
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Kelola nama produk, harga, dan jumlah stok yang tersedia.
                </p>
            </div>

            {{-- <a href="{{ route('produk.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:-translate-y-0.5 hover:bg-blue-700">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 4v16m8-8H4" />
                </svg>

                Tambah Produk
            </a> --}}
        </div>

        {{-- Notifikasi berhasil --}}
        @if (session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm text-emerald-700 shadow-sm">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5 flex-shrink-0"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                {{ session('success') }}
            </div>
        @endif

        {{-- Statistik --}}
        <div class="mb-6 grid gap-4 sm:grid-cols-3">

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">
                    Total Produk
                </p>

                <p class="mt-2 text-3xl font-bold text-slate-900">
                    {{ $produks->count() }}
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">
                    Total Stok
                </p>

                <p class="mt-2 text-3xl font-bold text-blue-600">
                    {{ $produks->sum('stok') }}
                </p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-sm font-medium text-slate-500">
                    Stok Menipis
                </p>

                <p class="mt-2 text-3xl font-bold text-amber-500">
                    {{ $produks->where('stok', '<=', 5)->count() }}
                </p>
            </div>

        </div>

        {{-- Tabel Produk --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-900">
                    Daftar Produk
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Seluruh data produk yang tersimpan dalam sistem.
                </p>
            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                No.
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Nama item
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Harga
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Stok
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">

                        @forelse ($produks as $produk)

                            <tr class="transition hover:bg-blue-50/50">

                                <td class="whitespace-nowrap px-6 py-5 text-sm font-medium text-slate-500">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">

                                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-100 font-bold text-blue-600">
                                            {{ strtoupper(substr($produk->nama, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="font-semibold text-slate-900">
                                                {{ $produk->nama }}
                                            </p>

                                            <p class="text-xs text-slate-500">
                                                ID Produk: {{ $produk->id }}
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                <td class="whitespace-nowrap px-6 py-5">
                                    <span class="font-bold text-slate-900">
                                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                    </span>
                                </td>

                                <td class="whitespace-nowrap px-6 py-5">

                                    @if ($produk->stok <= 0)

                                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                            Habis
                                        </span>

                                    @elseif ($produk->stok <= 5)

                                        <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">
                                            {{ $produk->stok }} tersisa
                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                                            {{ $produk->stok }} tersedia
                                        </span>

                                    @endif

                                </td>

                                <td class="whitespace-nowrap px-6 py-5">
                                    <div class="flex items-center justify-center gap-2">

                                        {{-- Tombol Edit --}}
                                        {{-- <a href="{{ route('produk.edit', $produk->id) }}"
                                           class="inline-flex items-center rounded-lg bg-amber-100 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-200">
                                            Edit
                                        </a> --}}

                                        {{-- Tombol Hapus --}}
                                        {{-- <form action=", --}}

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">

                                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-slate-100">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-8 w-8 text-slate-400"
                                             viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="1.5">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>

                                    </div>

                                    <h3 class="mt-4 font-bold text-slate-900">
                                        Belum ada produk
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Tambahkan produk pertama Anda untuk mulai mengelola data.
                                    </p>

                                    {{-- <a href="{{ route('produk.create') }}"
                                       class="mt-5 inline-flex rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">
                                        Tambah Produk
                                    </a> --}}

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>
</html>