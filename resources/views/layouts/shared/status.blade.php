@if (session('save'))
<div class="alert alert-info alert-dismissible fade show" style="margin-bottom: 0 !important" role="alert">
    {{ session('save') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('update'))
<div class="alert alert-success alert-dismissible fade show" style="margin-bottom: 0 !important" role="alert">
    {{ session('update') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('delete'))
<div class="alert alert-danger alert-dismissible fade show" style="margin-bottom: 0 !important" role="alert">
    {{ session('delete') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
