$('.delete-confirm').click(function(){
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        $(this).closest("form").submit();
    }
    })
});

function changeTitleToSLug(title){
    let slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
    return slug;
}
