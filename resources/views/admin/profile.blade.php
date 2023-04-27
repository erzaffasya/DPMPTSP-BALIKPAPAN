<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <h5 class="card-header">Setting Password</h5>
                    <!-- Account -->
                    {{-- <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div> --}}
                    <hr class="my-0" />
                    <div class="card-body">
                        <form action="{{ route('ubah-password') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Password Baru</label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        autofocus />
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Konfirmasi Password Baru</label>
                                    <input class="form-control" type="password" id="confirm_password"
                                        name="password_confirmation" autofocus />
                                    <span id='message'></span>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" id="submitpassword" class="btn btn-primary me-2">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
                {{-- <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?
                                </h6>
                                <p class="mb-0">Once you delete your account, there is no going back. Please be
                                    certain.</p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" onsubmit="return false">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="accountActivation"
                                    id="accountActivation" />
                                <label class="form-check-label" for="accountActivation">I confirm my account
                                    deactivation</label>
                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account">Deactivate
                                Account</button>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('#password, #confirm_password').on('keyup', function() {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#submitpassword').prop('disabled', false);
                    // $('#message').hide();
                } else
                    $('#submitpassword').prop('disabled', true);
                // $('#message').html('Password tidak sama!').css('color', 'red');

            });
        </script>
    @endpush
</x-app-layout>
