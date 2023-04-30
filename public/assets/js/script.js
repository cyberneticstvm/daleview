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
    $(document).on("change", ".selService", function(){
        var dis = $(this);
        var service = dis.val();
        $.ajax({
            type: 'GET',
            url: '/helper/getservice',
            data: {'service': service},
            success: function(response){
                dis.closest('tr').find('.qty').val(1);
                dis.closest('tr').find('.fee').val(response.fee);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log(XMLHttpRequest);
            }
        });
    })
});

function addRow(type){
    if(type == 'substance'){
        $(".tblSubstance").append("<tr><td><input class='form-control form-control-sm' type='text' name='type[]' placeholder='Type' required></td><td><input class='form-control form-control-sm' type='number' name='qty[]' placeholder='Qty' required></td><td><input class='form-control form-control-sm' type='text' name='frequency[]' placeholder='Frequency' required></td><td><input class='form-control form-control-sm' type='text' name='duration[]' placeholder='Duration' required></td><td class='text-center'><a href='javascript:void(0)' onclick='$(this).parent().parent().remove();'><i class='fa fa-times text-danger'></i></a></td></tr>");
    }
    if(type == 'lab'){
        $(".tblLab").append("<tr><td><select class='form-control form-control-md select2 selLab' data-placeholder='Select' name='labs[]' required='required'><option value=''>Select</option></select></td><td><input type='text' class='form-control' name='notes[]' placeholder='Notes / Remarks' /></td><td class='text-center'><a href='javascript:void(0)' onclick='$(this).parent().parent().remove();'><i class='fa fa-times text-danger'></i></a></td></tr>");
        $('.selLab').select2();
        bindDDL('lab', 'selLab');
    }
    if(type == 'medicine'){
        $(".tblMedicine").append("<tr><td><select class='form-control form-control-md select2 selMedicine' data-placeholder='Select' name='medicines[]' required='required'><option value=''>Select</option></select></td><td><input type='number' class='form-control' name='qty[]' placeholder='0' required /></td><td><input type='text' name='batch[]' class='form-control' placeholder='Batch Number' /></td><td><input type='text' class='form-control' name='dosage[]' placeholder='Dosage' required /></td><td><input type='text' class='form-control' name='notes[]' placeholder='Notes / Remarks' /></td><td class='text-center'><a href='javascript:void(0)' onclick='$(this).parent().parent().remove();'><i class='fa fa-times text-danger'></i></a></td></tr>");
        $('.selMedicine').select2();
        bindDDL('medicine', 'selMedicine');
    }
    if(type == 'service'){
        $(".tblService").append("<tr><td><select class='form-control form-control-md select2 selService' data-placeholder='Select' name='services[]' required='required'><option value=''>Select</option></select></td><td><input type='number' class='form-control fee' name='fee[]' placeholder='0.00' required /></td><td><input type='number' class='form-control qty' name='qty[]' placeholder='0' required /></td><td><input type='text' class='form-control' name='notes[]' placeholder='Notes / Remarks' /></td><td class='text-center'><a href='javascript:void(0)' onclick='$(this).parent().parent().remove();'><i class='fa fa-times text-danger'></i></a></td></tr>");
        $('.selService').select2();
        bindDDL('service', 'selService');
    }
}

function bindDDL(type, ddl){
    $.ajax({
        type: 'GET',
        url: '/helper/createddl/'+type
    }).then(function (data){
        xdata = $.map(data, function(obj){
            obj.text = obj.name || obj.id;  
            return obj;
        });
        $('.'+ddl).select2({data:xdata});
    });
}

setTimeout(function () {
    $(".alert").hide('slow');
}, 3000);