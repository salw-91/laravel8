@include('auth.includes.header' ,['title'=>'Register'])
<div class="login100-pic js-tilt" data-tilt>
    <img src="../auth/images/img-01.png" alt="IMG">
</div>
                <form method="POST" action="{{ route('user.store') }}" class="login100-form validate-form">
                    @csrf
					<span class="login100-form-title">
						Member Create User
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid name is required: Adam">
						<input class="input100 @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100  @error('password') is-invalid @enderror" type="password" name="password_confirmation"  placeholder="Confirm Password">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Create User
						</button>
					</div>
					<div class="text-center p-t-136">
                        <a class="txt2" href="{{ route('users') }}">

							Go Back
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    @include('auth.includes.footer')
