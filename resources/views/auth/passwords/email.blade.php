@include('auth.includes.header' ,['title'=>'Reset Password'])
<div class="login100-pic js-tilt" data-tilt>
    <img src="../auth/images/img-01.png" alt="IMG">
</div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}"  class="login100-form validate-form">
                @csrf

					<span class="login100-form-title">
						Member Reset Password
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

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

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Reset Password
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
    @include('auth.includes.footer')
