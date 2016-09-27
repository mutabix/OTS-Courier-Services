<form action='login.php' method='POST' novalidate>
    <div class='card col-md-3 col-centered vertical-center'>
        <div class='row'>
            <h4>Login</h4>
            <div class='col-md-10 col-centered'>
                <div class='form-group'>
                    <label for='loginEmail'>Email Address</label>
                    <input type='email' class='form-control' placeholder='Email Address' name='loginEmail'>
                </div>
            </div>
            <div class='col-md-10 col-centered'>
                <div class='form-group'>
                    <label for='loginPassword'>Password</label>
                    <input type='password' class='form-control' placeholder='Password' name='loginPassword'>
                </div>
            </div>
        </div>
        <br />
        <div class='col-md-10 col-centered'>
            <button type='submit' class='btn btn-info btn-fill' name='submitLogin' style='padding-left: 30px; padding-right: 30px;'>Login</button>
        </div>
        <br />
        <div class='col-md-12'>
            <div class='row' style='margin-top: 20px'>
                <button type='button' class='white-custom-button btn btn-info btn-fill col-md-12' name='submitRegistration' onclick='goToConsumerLogin()'>Customer Login</button>
            </div>

            <script>
                    function goToConsumerLogin() {
                        window.location = '../dashboard/login.php';
                    }
            </script>
        </div>
    </div>
</form>