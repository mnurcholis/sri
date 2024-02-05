<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - APRIZOB</title>
    <link rel="shortcut icon" href="{{ asset('images/pemda.ico') }}">
    <link href="{{ asset('costum/style.css') }}" rel="stylesheet">
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless/global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/layout_1/LTR/default/full/assets/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless/layout_1/LTR/default/full/assets/css/bootstrap_limitless.min.css') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('limitless/layout_1/LTR/default/full/assets/css/layout.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless/layout_1/LTR/default/full/assets/css/components.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('limitless/layout_1/LTR/default/full/assets/css/colors.min.css') }}" rel="stylesheet"
        type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('limitless/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('limitless/global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/buttons/spin.min.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/plugins/buttons/ladda.min.js') }}"></script>

    <script src="{{ asset('limitless/layout_1/LTR/default/full/assets/js/app.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_pages/login.js') }}"></script>
    <script src="{{ asset('limitless/global_assets/js/demo_pages/components_buttons.js') }}"></script>

    <!-- /theme JS files -->

</head>

<body>

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">
                <!-- Login card -->
                <form class="login-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="card mb-0">
                        <div class="card-body">
                            <x-elrista />
                            <div class="text-center mb-3">
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Your credentials</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left input-field">
                                <input type="text" class="form-control" spellcheck="false" name="email" autofocus
                                    required>
                                <label class="d-block text-muted" style="margin-left: 30px;">Email</label>
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left input-field">
                                <input type="password" class="form-control" spellcheck="false" name="password" required>
                                <label class="d-block text-muted" style="margin-left: 30px;">Password</label>
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-center">
                                <a href="{{ url('forgot-password') }}" class="ml-auto">Forgot password?</a>
                            </div>

                            <div class="form-group">
                                <button type="submit" data-initial-text="<i class='icon-spinner4 mr-2'></i> Sign In"
                                    data-loading-text="<i class='icon-spinner4 spinner mr-2'></i> Loading..."
                                    class="btn btn-primary btn-block btn-loading">
                                    Sign In <i class="icon-circle-right2 ml-2"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
                <!-- /login card -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
</body>

</html>
