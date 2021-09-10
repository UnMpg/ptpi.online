<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span>Halo, kami adalah akun email official dari PTPI.</span>
                    <span>Kunjungi <a href="https://www.iahe.or.id/">Official Website PTPI.</a></span>
                </div>
                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh mail has been sent to your email address.') }}
                    </div>
                    @endif
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</div>