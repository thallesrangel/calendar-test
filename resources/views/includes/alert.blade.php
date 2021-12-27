@if (Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sucesso',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif

@if (Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
    })
   </script>
@endif

@if (Session::has('permission_denied'))
   <script>
        Swal.fire({
            icon: 'warning',
            title: 'Permissão Negada',
            text: '{{ session('permission_denied') }}',
            showConfirmButton: false,
            timer: 2000
    })
   </script>
@endif

@if (Session::has('warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Atenção',
            text: '{{ session('warning') }}',
            confirmButtonText: 'Entendido',
            confirmButtonColor: '#e74c3c',
    })
   </script>
@endif