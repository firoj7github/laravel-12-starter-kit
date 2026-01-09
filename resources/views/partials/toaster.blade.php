@if(session('success') || session('error') || $errors->any())
<script>
document.addEventListener("DOMContentLoaded", function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
    });

    @if(session('success'))
    Toast.fire({
        icon: 'success',
        title: @json(session('success'))
    });
    @endif

    @if(session('error'))
    Toast.fire({
        icon: 'error',
        title: @json(session('error'))
    });
    @endif

    @if($errors->any())
    // Show first validation error + count of remaining errors
    let firstError = @json($errors->first());
    let totalErrors = {{ $errors->count() }};
    let message = firstError;
    if(totalErrors > 1){
        message += ` (${totalErrors - 1} more error${totalErrors - 1 > 1 ? 's' : ''})`;
    }

    Toast.fire({
        icon: 'error',
        title: message
    });
    @endif
});
</script>
@endif
