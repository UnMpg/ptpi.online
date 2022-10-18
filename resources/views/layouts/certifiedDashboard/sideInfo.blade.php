<div class="profile clearfix">
    <div class="profile_pic">
     
      @if (auth('certified')->user()->foto == null)
        
        <img src="{{ asset('assets/certified/img/lsp.jpeg') }}" alt="..." class="img-circle profile_img">
      @else
        <img src="{{ asset('assets/certified/upload/'.auth('certified')->user()->nama.'/'.auth('certified')->user()->foto) }}" alt="..." class="img-circle profile_img">
      @endif

      {{-- <img src="{{ asset('assets/certified/img/lsp.jpeg') }}" alt="..." class="img-circle profile_img"> --}}
      
    </div>
    <div class="profile_info">
      <span>Welcome LSP TPI</span>
      <h2>{{ auth('certified')->user()->nama }}</h2>
    </div>
  </div>