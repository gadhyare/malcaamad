<livewire:scripts />

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="{{asset('js/index.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="{{asset('js/select2.js')}}"></script>
<script src="{{asset('js/datatables.js')}}"></script>
<script>


    document.addEventListener('hide-moda', event => {
        $(".xidh").modal("hide");
    })


    $(document).ready(function() {
    // Select2 Multiple
    $('.select2').select2({
        placeholder: "Select",
        allowClear: true
    });

});


    $(document).ready(function() {
     $('#myTable').DataTable({
       paging: true,
       fixedColumns: true,
       language: {
         "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
       }
     });
   });


 </script>
   @include('admin.layouts.sweetaler')



</body>

</html>
