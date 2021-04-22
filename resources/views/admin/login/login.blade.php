@extends('admin.layouts.loginlayout')

@section('loginform')

<div class=" fulldivision">
    <div class="card card-body logincard">
        <form action="">


            <div class="loginheader">
                <div class="heading">
                    <h5>Admin Panel</h5>
                </div>
                <div class="adminicon">
                    <span class="fas fa-user"></span>
                </div>
            </div>

            <div class="formpart">
                            <div class="input-group mb-4">
                                <input type="email" class="form-control " placeholder="xyz@email.com">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control " placeholder="Passoword">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                <button class="btn btn-success">Login</button>
            </div>


        </form>
    </div>
</div>

@endsection
