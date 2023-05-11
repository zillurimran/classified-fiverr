<!-- Newsletter-->
<section class="sptb border-top @isset($class) {{ $class }} @endisset">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-xl-6 col-md-12">
                <div class="sub-newsletter">
                    <h3 class="mb-2"><i class="fa fa-paper-plane-o me-2"></i> Subscribe To Our Newsletter</h3>
                    <p class="mb-0">Subscribe To Classified For More Updates</p>
                </div>
            </div>
            <div class="col-lg-5 col-xl-6 col-md-12">
                <form>
                    <div class="input-group sub-input mt-1">
                        <input type="email" name="email" id="subscribeMail" class="form-control input-lg" placeholder="Enter your Email" required>
                        <div class="input-group-text border-0 bg-transparent p-0 ">
                            <button type="submit" id="subscribeBtn" class="btn btn-primary btn-lg br-te-7 br-be-7">
                                Subscribe
                            </button>
                        </div>
                    </div>
                    <p id="succeessMessage"></p>
                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</section>

@push('custom-js')
<script>

    $(document).ready(function () {
        $('#subscribeBtn').on('click', function(e){
            e.preventDefault();
            let email = $('#subscribeMail').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('subscribeMail') }}",
                type: "post",
                data: {
                    email: email
                },
                success: function (response){
                    $('#subscribeMail').val('');

                    $('#alert').show();
                    window.setTimeout(function () {
                        $('#succeessMessage').html('<h2>Subscribe !</h2>');
                    }, 2000);
                },
                error: function(err){
                    $('#subscribeMail').val('');
                    window.setTimeout(function () {
                        $('#succeessMessage').html('<h2>you are already subscribed !</h2>');
                    }, 2000);
                }
            });
        });
    });

</script>
@endpush
<!--/Newsletter-->
