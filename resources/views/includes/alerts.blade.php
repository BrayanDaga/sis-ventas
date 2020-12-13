@if (session()->has('success'))
<script>
Swal.fire(
    'Procesado con Exito',
  '{{ session()->get('success') }}',
   'success'
)

</script>
 @endif

