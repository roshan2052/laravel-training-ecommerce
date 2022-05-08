<script>
    $("#name").keyup(function(){
        let name = $(this).val();
        let slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        $("#slug").val(slug);
    });

</script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        // $('.ckeditor').ckeditor();

        // script
        $('#category_id').on('change', function() {
        let category_id = $(this).val();

        if(category_id.length > 0){
            $.ajax({
            url: "{{route('product.get_sub_category')}}",
            data: {_token: "{{csrf_token()}}", category_id: category_id},
            dataType: "JSON",
            method: "POST",
            success: function(resp) {
            $('#sub_category_id').children('option').not(':first').remove();
                $.each(resp, (key, value) => {
                    $('#sub_category_id').append('<option value=' + key + '>' + value + '</option>');
                })
                },
            })
        }
        else{
            $('#sub_category_id').children('option').not(':first').remove();
        }
        });

        var y = 1;
        $('#addMoreAttribute').click(function(){
            var max_fields = 5;
            if (y < max_fields) { //max input box allowed
                y++;
                $("#attribute_wrapper tr:last").after(
                    '<tr>'+
                    '   <td>{!! Form::select('attribute_id[]',[],null,['class' => 'form-control','placeholder' => "Select Attribute"]) !!}'+
                    '   </td>'+
                    '   <td><input type="text" name="attribute_value[]" class="form-control" placeholder="Enter Attribute Value"/></td>'+
                    '   <td>'+
                    '       <a class="btn btn-block btn-danger sa-warning remove_row"><i class="fa fa-trash"></i></a>'+
                    '   </td>'+
                    '</tr>'
                );
            }
            else{
                alert('Maximum Attribute Limit is 5');
            }
        });

        $(document).on("click",".remove_row",function() {
            if(y > 1){
                y--;
                $(this).closest("tr").remove();
            }else{
                alert('Sorry you can\'t remove last row');
            }
        });


    });

</script>
