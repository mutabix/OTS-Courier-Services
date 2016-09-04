<form action='register.php' method='POST' novalidate>
    <div class='card col-md-6 col-centered vertical-center'>
        <div class='row col-centered'>
            <h4>Register</h4>
            <div class='row col-centered'>
                <div class='col-md-12'>
                    <div class='form-group'>
                        <label for='companyName'>Company Name</label>
                        <input type='text' class='form-control' placeholder='Company Name' name='companyName'>
                    </div>
                </div>
            </div>

            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='firstName'>First Name*</label>
                    <input type='text' class='form-control' placeholder='First Name' name='firstName'>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='lastName'>Last Name*</label>
                    <input type='text' class='form-control' placeholder='Last Name' name='lastName'>
                </div>
            </div>
        </div>

        <div class='row col-centered'>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='email'>Email*</label>
                    <input type='email' class='form-control' placeholder='Email Address' name='email'>
                </div>
            </div>

            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='mobileNumber'>Mobile Number*</label>
                    <input type='number' class='form-control' placeholder='Mobile Number' name='mobileNumber'>
                </div>
            </div>
        </div>

        <div class='row col-centered'>
            <div class='col-md-12'>
                <div class='form-group'>
                    <label for='addressLine1'>Address Line 1*</label>
                    <input type='text' class='form-control' placeholder='Address Line 1' name='addressLine1'>
                </div>
            </div>
        </div>

        <div class='row col-centered'>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='addressLine2'>Address Line 2</label>
                    <input type='text' class='form-control' placeholder='Address Line 2' name='addressLine2'>
                </div>
            </div>

            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='suburb'>Suburb*</label>
                    <input type='text' class='form-control' placeholder='Suburb' name='suburb'>
                </div>
            </div>
        </div>

        <div class='row col-centered'>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='state'>State*</label>
                    <select class='form-control' id='state' name='state'>
                        <option selected disabled>Select State / Territory</option>
                        <option>QLD</option>
                        <option>NSW</option>
                        <option>ACT</option>
                        <option>VIC</option>
                        <option>SA</option>
                        <option>NT</option>
                        <option>WA</option>
                        <option disabled>TAS</option>
                    </select>
                </div>
            </div>

            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='postcode'>Postcode*</label>
                    <input type='number' class='form-control' placeholder='Postcode' name='postcode'>
                </div>
            </div>
        </div>

        <div class='row col-centered'>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='password'>Password*</label>
                    <input type='password' class='form-control' placeholder='Password' name='password'>
                </div>
            </div>

            <div class='col-md-6'>
                <div class='form-group'>
                    <label for='confirmPassword'>Confirm Password*</label>
                    <input type='password' class='form-control' placeholder='Confirm Password' name='confirmPassword'>
                </div>
            </div>
        </div>








        <br />
        <div class='col-md-10 col-centered'>
            <button type='submit' class='btn btn-info btn-fill' name='submitRegistration' style='padding-left: 30px; padding-right: 30px;'>Register</button>
        </div>
        <br />

        <br />
        <div class='col-md-12'>
            <div class='row' style='margin-top: 20px'>
                <button type='submit' class='btn btn-info btn-fill col-md-12 white-custom-button' name='submitRegistration'>Already Have an Account? Login.</button>
            </div>
        </div>
    </div>
</form>