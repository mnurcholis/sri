<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/') }}/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/layout_1/LTR/default/full/') }}/assets/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless/layout_1/LTR/default/full/') }}/assets/css/bootstrap_limitless.min.css"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/layout_1/LTR/default/full/') }}/assets/css/layout.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless/layout_1/LTR/default/full/') }}/assets/css/components.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless/layout_1/LTR/default/full/') }}/assets/css/colors.min.css" rel="stylesheet"
        type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('limitless/') }}/global_assets/js/main/jquery.min.js"></script>
    <script src="{{ asset('limitless/') }}/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('limitless/') }}/global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('limitless/layout_1/LTR/default/full/') }}/assets/js/app.js"></script>
    <!-- /theme JS files -->
    @stack('css')
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>

<body>

    <!-- Main navbar -->
    @include('layouts.admin.navbar')
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @include('layouts.admin.sidebar')
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            {{ $header ?? '' }}
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">
                {{ $slot ?? '' }}
            </div>
            <!-- /content area -->


            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                        data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        &copy; 2023 <a href="https://wa.me/6285157392291">Tri Maryanto</a> And <a
                            href="https://wa.me/6282243041272" target="_blank">M Nurcholis</a>
                    </span>
                </div>
            </div>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    @livewireScripts
    @stack('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('Delete', event => {
            Swal.fire(
                'Deleted!', 'Data has been deleted.', 'success'
            )
        });
        window.addEventListener('Success', event => {
            Swal.fire(
                'Good job!', 'Data has been added.', 'success'
            )
        });
        window.addEventListener('Update', event => {
            Swal.fire(
                'Good job!', 'Data has been updated.', 'success'
            )
        });
        window.addEventListener('Error', event => {
            Swal.fire(
                'Warning !', 'Data Not Excecution.', 'error'
            )
        });

        window.addEventListener('swal:modal', event => {
            Swal.fire({
                icon: event.detail.type, // Jenis alert
                title: event.detail.title, // Judul pesan
                text: event.detail.text, // Isi pesan
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
            });
        });
    </script>
</body>

</html>
