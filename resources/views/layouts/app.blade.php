<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{-- datatables --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.0.1/b-html5-2.0.1/datatables.min.css"/>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
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

        @stack('modals')

        @livewireScripts

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        {{-- datatables --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.0.1/b-html5-2.0.1/datatables.min.js"></script>

        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.addEventListener('swal:success', event => { 
                Swal.fire({
                    title: event.detail.title,
                    icon: 'success',
                    iconColor: '#fff',
                    toast: true, //tamaño de la ventana
                    position: 'top-right',
                    background: '#28a745', //fondo de la ventana
                    timer: 2500,
                    timerProgressBar: true, //barra de tiempo
                    showConfirmButton: false,
                });
            });

            window.addEventListener('swal:error', event => { 
                Swal.fire({
                    title: event.detail.title,
                    icon: 'error',
                    iconColor: '#fff',
                    toast: true, //tamaño de la ventana
                    position: 'top-right',
                    background: '#dc3545', //fondo de la ventana
                    timer: 2500,
                    timerProgressBar: true, //barra de tiempo
                    showConfirmButton: false,
                });
            });

            window.addEventListener('tabla', event => {
                $(event.detail.nombreTabla).DataTable();
                console.log('Updated table : ' + event.detail.nombreTabla)
            });

            window.addEventListener('swal:confirm', event => { 
                Swal.fire({
                    title: '¿Desea eliminar el registro?',
                    text: 'Si lo elimina, esta acción no se puede deshacer',
                    icon: 'error',
                    iconColor: '#dc3545',
                    reverseButtons: true,
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.livewire.emit('delete', event.detail.id);
                    }
                });
            });
        </script>
        @stack('scripts')
    </body>
</html>
