<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .bg-blue-momo {
                background-color: #004f71;
                color: white;
            }

            .btn-blue-momo {
                padding: 0.75em;
                background-color: #004f71;
                color: white;
            }
            .bg-text-momo {
                background-color: #004f71;
                color: #ffcc00;
            }
            .btn-blue-momo:hover, .btn-blue-momo:focus {
                background-color: #004f73;
                color: #ffcc00;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <footer class="footer bg-blue-momo">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        MMCTicket © Copyright {{date('Y')}}
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by Johanne
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
