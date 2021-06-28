<!DOCTYPE html>
<html lang="en">

<head>

    @include('asset.css.css')
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                @if (session('success'))
                                    <div class="alert alert-success"> {{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger"> {{ session('error') }}</div>
                                @endif
                                <div class="form-group ">

                                    <input type="text" name="name" class="form-control form-control-user"
                                        id="exampleFirstName" placeholder=" Name">


                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        id="exampleInputEmail" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="mobile_number" class="form-control form-control-user"
                                        id="exampleInputMobile Number" placeholder="Mobile Number">
                                </div>


                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                                <div class="text-center">
                                    <a class="small" href="{{ route('forget-password') }}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('asset.js.js')

</body>

</html>
