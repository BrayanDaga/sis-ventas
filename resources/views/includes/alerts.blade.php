@if (session()->has('success'))
<script>
Swal.fire(
    'Guardado con Exito',
  '{{ session()->get('success') }}',
   'success'
)

</script>
 @endif

