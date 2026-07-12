<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Perpustakaan'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS untuk halaman lama Buku & Anggota -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Breeze / Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <!-- Page Transition Styles -->
    <style>
        /* Progress bar loading di atas */
        #page-progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0%;
            background: linear-gradient(90deg, #4f46e5, #6366f1);
            z-index: 9999;
            transition: width 0.3s ease, opacity 0.3s ease;
            opacity: 0;
        }

        #page-progress-bar.active {
            opacity: 1;
        }

        /* Fade-in untuk konten halaman saat dimuat */
        .page-fade-in {
            animation: pageFadeIn 0.35s ease-out;
        }

        @keyframes pageFadeIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="font-sans antialiased">

    <!-- Progress Bar -->
    <div id="page-progress-bar"></div>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="page-fade-in">
            @isset($slot)
                {{ $slot }}
            @else
                <div class="container py-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show flash-alert" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show flash-alert" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('warning'))
                        <div class="alert alert-warning alert-dismissible fade show flash-alert" role="alert">
                            {{ session('warning') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('info'))
                        <div class="alert alert-info alert-dismissible fade show flash-alert" role="alert">
                            {{ session('info') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            @endisset
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap JS untuk halaman lama Buku & Anggota -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.querySelectorAll('.flash-alert').forEach(function(alert) {
                    let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                    bsAlert.close();
                });
            }, 5000);
        });

        // ===== Page Transition: Progress Bar =====
        (function() {
            const bar = document.getElementById('page-progress-bar');

            function startProgress() {
                bar.style.width = '0%';
                bar.classList.add('active');
                requestAnimationFrame(function() {
                    bar.style.width = '70%';
                });
            }

            function finishProgress() {
                bar.style.width = '100%';
                setTimeout(function() {
                    bar.classList.remove('active');
                    bar.style.width = '0%';
                }, 300);
            }

            // Tampilkan progress bar saat klik link internal (bukan blank/anchor)
            document.addEventListener('click', function(e) {
                const link = e.target.closest('a');
                if (!link) return;

                const isSameOrigin = link.href && link.href.startsWith(window.location.origin);
                const isBlank = link.target === '_blank';
                const isAnchor = link.getAttribute('href') && link.getAttribute('href').startsWith('#');
                const isDownload = link.hasAttribute('download');

                if (isSameOrigin && !isBlank && !isAnchor && !isDownload) {
                    startProgress();
                }
            });

            // Tampilkan progress bar saat submit form (kecuali form delete)
            document.addEventListener('submit', function(e) {
                if (!e.target.classList.contains('delete-form')) {
                    startProgress();
                }
            });

            // Selesaikan progress bar saat halaman baru selesai dimuat
            window.addEventListener('pageshow', finishProgress);
        })();
    </script>

    @stack('scripts')
</body>

</html>
