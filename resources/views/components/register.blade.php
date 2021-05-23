<form class="register-form" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row mb-1">
        <div class="col-md-6">
            <label for="reg-f-name">First Name</label>
            <input class="form-control" id="reg-f-name" placeholder="Enter First Name" name="reg_first_name">
        </div>
        <div class="col-md-6">
            <label for="reg-l-name">Last Name</label>
            <input class="form-control" id="reg-l-name" placeholder="Enter Last Name" name="reg_last_name">
        </div>
    </div>
    <div class="col-md-12 mb-1">
        <label for="reg-username">Username</label>
        <input type="text" class="form-control" id="reg-username" placeholder="Enter Username" name="reg_username">
    </div>
    <div class="col-md-12 mb-1">
        <label for="reg-email">Email</label>
        <input type="email" class="form-control" id="reg-email" placeholder="Enter Email" name="reg_email">
    </div>
    <div class="col-md-12 mb-1">
        <label for="reg-password">Password</label>
        <input type="password" class="form-control" id="reg-password" placeholder="Enter Password" name="reg_password">
    </div>
    <div class="col-md-12 mb-1">
        <label for="reg-confirm">Confirm Password</label>
        <input type="password" class="form-control" id="reg-confirm" placeholder="Enter Password Confirmation" name="reg_confirm">
    </div>
    <div class="d-flex justify-content-center mt-2">
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </div>
</form>
