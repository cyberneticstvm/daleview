$(function(){
    "use strict"
    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".datatables-basic").dataTable();

    $('.select2').select2({
        placeholder: 'Select'
    });

    $(".frm-tbl .form-check-input").click(function(){
        var cls = $(this).data('name'); var val = 1;
        if(!$(this).is(":checked")){
            val = 0;
        }else{
            val = 1;
        };
        $('.'+cls).val(val);
    });
});

function addRow(type){
    if(type == 'substance'){
        $(".tblSubstance").append("<tr><td><input class='form-control form-control-sm' type='text' name='type[]' placeholder='Type' required></td><td><input class='form-control form-control-sm' type='number' name='qty[]' placeholder='Qty' required></td><td><input class='form-control form-control-sm' type='text' name='frequency[]' placeholder='Frequency' required></td><td><input class='form-control form-control-sm' type='text' name='duration[]' placeholder='Duration' required></td><td class='text-center'><a href='javascript:void(0)' onclick='$(this).parent().parent().remove();'><i class='fa fa-times text-danger'></i></a></td></tr>");
    }
}

/*setTimeout(function () {
    $(".alert").hide('slow');
}, 3000);*/