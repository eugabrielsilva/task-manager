{{-- Success alert --}}
@if(session('message'))
<div class="alert alert-success mt-4 mb-0">
    <span>
        <i class="fas fa-check-circle me-1"></i>
        {{ session('message') }}
    </span>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- Error alert --}}
@if(session('error'))
<div class="alert alert-danger mt-4 mb-0">
    <span>
        <i class="fas fa-exclamation-circle me-1"></i>
        {{ session('error') }}
    </span>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
