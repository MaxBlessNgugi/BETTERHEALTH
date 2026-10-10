
$(document).ready(function(){
var loader = '<span id="img-spinner" class="bh-spinner" role="status" aria-label="Loading" style="position:absolute; top:45%; left:50%"></span>';

    // DataTable
    var phcdiaginoisDataTable = $('#phcdiaginoisTable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        //'searching': false, // Remove default Search Control
        'ajax': {
            'url':'ipdphcdiagmanager.php',
            'data': function(data){
                // Read values
                //var gender = $('#searchByGender').val();
                var name = $('#searchByName').val();
                //var comp = $('#searchByCompany').val();

                // Append to data
                //data.searchByGender = gender;
                data.searchByName = name;
                //data.searchByCompany = comp;
            }
        },
        'columns': [
            { data: 'DiagnosisParentNameParentCode' },
            { data: 'DiagnosisChildName' },
            { data: 'DiagnosisCode' },
                    { data: 'action' },
        ]
    });

    $('#searchByName').keyup(function(){
        phcdiaginoisDataTable.draw();
    });

    // $('#searchByGender').change(function(){
    //     phcdiaginoisDataTable.draw();
    // });
    // $('#searchByCompany').change(function(){
    //     phcdiaginoisDataTable.draw();
    // });


    // Update record
    $('#phcdiaginoisTable').on('click','.updtipdPhcDiagnosis',function(){
        var id = $(this).data('id');

        $('#txt_userid').val(id);
        //var id = $('#txt_userid').val();

        var old_patient_id = $('#old_patient_id').val().trim();
        var regn = $('#regn').val().trim();
        var old_presc_id = $('#old_presc_id').val().trim();
        var old_presc_no = $('#old_presc_no').val().trim();

        // AJAX request
        //$('#disphcdiagtbl').html(loader);
        //$('#message').html(loader);
        //$('#refresh_phc_diagnosis_ipd').html('<span id="img-spinner" class="bh-spinner" role="status" aria-label="Loading" style="position:absolute; top:45%; left:50%"></span>');
        $("#refresh_phc_diagnosis_ipd").html(loader).delay(3000).fadeOut(9000);
        $.ajax({
            url: 'ipdphcdiagmanager.php',
            type: 'post',
            data: {request: 2, id: id, old_patient_id:old_patient_id, regn:regn, old_presc_id:old_presc_id, old_presc_no:old_presc_no},
            dataType: 'json',
            success: function(response){
                $('#refresh_phc_diagnosis_ipd').html(response);
                $('#disp_phc_diagnosis_ipd').html(response.data);
                if(response.status == 1){
                    $('#stokTransferRequestTable tbody').empty();

                    $('#diagparentname').val(response.data.parent_name);
                    $('#diagchildname').val(response.data.child_name);
                    $('#diagnosis_code').val(response.data.diagnosis_code);
                    $('#message').text(response.appco_status_message);
                    $('#message').addClass('label label-success');
                    $('#appco_status_message').text(response.appco_status_message);
                    $('#appco_status_message').addClass('label label-success');
                    $("#message").html(loader).delay(3000).fadeOut(9000);
                    $('#appco_status_message').html(response.appco_status_message).delay(3000).fadeOut(9000);

                        // Reload DataTable
                        phcdiaginoisDataTable.ajax.reload();

                }else if(response.status == 0){
                    $('#message').text(response.appco_status_message);
                    $('#message').addClass('label label-danger');
                    $('#appco_status_message').text(response.appco_status_message);
                    $('#appco_status_message').addClass('label label-danger');
                    $("#message").html(loader).delay(3000).fadeOut(9000);
                    $('#appco_status_message').html(response.appco_status_message).delay(3000).fadeOut(9000);

                        // Reload DataTable
                        phcdiaginoisDataTable.ajax.reload();

                }else{alert("Invalid IDD.");}

                if(response.appco_status == 1){
                    $('#message').text(response.appco_status_message);
                    $('#message').addClass('label label-success');
                    $('#appco_status_message').text(response.appco_status_message);
                    $('#appco_status_message').addClass('label label-success');
                    $("#message").html(loader).delay(3000).fadeOut(9000);
                    $('#appco_status_message').html(response.appco_status_message).delay(3000).fadeOut(9000);

                        // Reload DataTable
                        phcdiaginoisDataTable.ajax.reload();
                }else if(response.appco_status == 0){
                    //alert("Aready Exist.");
                    $('#message').text(response.appco_status_message);
                    $('#message').addClass('label label-danger');
                    $('#appco_status_message').text(response.appco_status_message);
                    $('#appco_status_message').addClass('label label-danger');
                    $("#message").html(loader).delay(3000).fadeOut(9000);
                    $('#appco_status_message').html(response.appco_status_message).delay(3000).fadeOut(9000);

                        // Reload DataTable
                        phcdiaginoisDataTable.ajax.reload();

                }else{alert("Invalid IDD.");}
            //$('#message').html(loader);
            //$('#disphcdiagtbl').html(loader);
            }
        });

    });


    // Save user 
    $('#btn_save').click(function(){
        var id = $('#txt_userid').val();

        var fullnames = $('#fullnames').val().trim();
        var email = $('#email').val().trim();
        var gender = $('#gender').val().trim();
        var contact = $('#contact').val().trim();
        var phone2 = $('#phone2').val().trim();
        var address = $('#address').val().trim();
        var gname = $('#gname').val().trim();
        var grship = $('#grship').val().trim();
        var geno = $('#geno').val().trim();
        //var gaddress = $('#gaddress').val().trim();

        if(fullnames !='' && email != '' && contact != '' && phone2 !='' && address !='' && gname != ''  && geno != ''){
        /*if(fullnames !='' && email != '' && contact != ''){*/

            // AJAX request
            $.ajax({
                url: 'ipdphcdiagmanager.php',
                type: 'post',
                data: {request: 3, id: id,fullnames: fullnames, email: email, gender: gender, contact:contact, phone2:phone2, address:address, gname:gname, grship:grship, geno:geno},
                dataType: 'json',
                success: function(response){
                    if(response.status == 1){
                        alert(response.message);

                        // Empty the fields
                        $('#fullnames','#email','#contact','#phone2','#address','#gname','#grship','#geno').val('');
                        $('#gender').val('');
                        $('#txt_userid').val(0);

                        // Reload DataTable
                        phcdiaginoisDataTable.ajax.reload();

                        // Close modal
                        $('#updtipdPhcDiagnosisModal').modal('toggle');
                    }else{
                        alert(response.message);
                    }
                }
            });

        }else{
            alert('Please fill all fields.');
        }
    });


    // Delete record
    $('#phcdiaginoisTable').on('click','.deleteUser',function(){
        var id = $(this).data('id');

        var deleteConfirm = confirm("Are you sure?");
        if (deleteConfirm == true) {
            // AJAX request
            $.ajax({
                url: 'ipdphcdiagmanager.php',
                type: 'post',
                data: {request: 4, id: id},
                success: function(response){

                    if(response == 1){
                        alert("Record deleted.");

                        // Reload DataTable
                        phcdiaginoisDataTable.ajax.reload();
                    }else{
                        alert("Invalid ID.");
                    }
                    
                }
            });
        } 
        
    });
});


