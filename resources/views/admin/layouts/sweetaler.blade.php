<script>
    window.addEventListener('show-delete-confirmation', function(event) {

        Swal.fire({
            title: 'رسالة حذف',
            text: "هل أنت متأكد من حذف السجل",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ac103f',
            cancelButtonColor: '#0960d1',
            confirmButtonText: 'نعم, احذف',
            cancelButtonText: 'تراجع',
        }).then((result) => {
            if (result.isConfirmed) {
                livewire.emit('deleteConfirmed')
            }
        });

    });


    window.addEventListener('success-opration', function(event) {
        Swal.fire({
            title: 'تمت العملية بنجاح',
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "اغلاف",
            customClass: {
                confirmButton: "btn bg-gray-dark text-white"
            }
        })
    })
</script>
