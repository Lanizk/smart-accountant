@extends('layout.app')

@section('content')
<div class="main-wrapper">
<div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
    <div class="auth-box bg-dark border-top border-secondary">
        <div>
            <div class="text-center  p-t-20 p-b-20">
                <span class="db"><img src="{{ asset('assets/images/logo.png') }}" alt="logo" /></span>
            </div>
            <!-- Form -->
            <form class="form-horizontal m-t-20" method="POST">
                @csrf
                @error('company_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                <div class="row p-b-30">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-success text-white"><i class="ti-briefcase"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" placeholder="Companyname" name="company_name" value="{{ old('company_name') }}" required>
                        </div>
                        <div>
                       
</div>
@error('full_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-danger text-white"><i class="ti-user"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" placeholder="Username" name="full_name" value="{{ old('full_name') }}" required>
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        <!-- email -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-white"><i class="ti-email"></i></span>
                            </div>
                            <input type="email" class="form-control form-control-lg" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                        </div>

                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white"><i class="ti-mobile"></i></span>
                            </div>
                            <input type="text" class="form-control form-control-lg" placeholder="Phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-group mb-3">
    <!-- Lock icon on the left -->
    <div class="input-group-prepend">
        <span class="input-group-text bg-info text-white">
            <i class="ti-lock"></i>
        </span>
    </div>

    <!-- Password input field -->
    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" id="password" value="{{ old('password') }}" required>

    <!-- Toggle icon on the right -->
    <div class="input-group-append">
        <span class="input-group-text bg-light" onclick="togglePasswordVisibility()" style="cursor: pointer;">
            <i id="toggleIcon" class="ti-eye"></i> <!-- Eye icon for show/hide -->
        </span>
    </div>
</div>
<small class="form-text text-muted">
    Password must be at least 8 characters long, include at least one uppercase letter, one lowercase letter, one number, and one special character.
</small>
                        
                      
                        
                    </div>
                </div>
                <div class="row border-top border-secondary">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="p-t-20">
                                <button class="btn btn-block btn-lg btn-info" type="submit">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
</script>
<script>
function togglePasswordVisibility(){
    const passwordField=document.getElementById("password");
    const toggleIcon=document.getElementById("toggleIcon");

       // Toggle password visibility
       if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("ti-eye");
            toggleIcon.classList.add("ti-eye-off"); // Change icon to indicate hidden
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("ti-eye-off");
            toggleIcon.classList.add("ti-eye"); // Change icon to indicate shown
        }
}
    </script>
@endsection
