$(document).ready(function() {



    function populateInsurersSelect(insurers) {
        console.log(insurers); // Log the insurers variable
        $("#insurer_id").empty();
    
        for (let i = 0; i < insurers.length; i++) {
            $("#insurer_id").append(`<option value="${insurers[i][0]}">${insurers[i][1]}</option>`);
        }
    }
    
    function fetchInsurersData() {
        $.ajax({
            url: '../Controllers/articleCrl.php',
            method: 'POST',
            data: { action: 'insurer' },
            dataType: 'json', // Specify the expected data type
            success: function (data) {
                console.log(data);
                populateInsurersSelect(data);
            },
            error: function (error) {
                console.error('Error fetching insurers data:', error);
            }
        });
    }
    
    $("#addModal").on("show.bs.modal", function (e) {
        fetchInsurersData();
    });
    


    function showAllArticles(clientId) {
        $.ajax({
            url: "../Controllers/articleCrl.php",
            method: 'POST',
            data: {
                action: "view",
                clientId: clientId
            },
            success: function (response) {
                $("#showUser").html(response);
                $("table").DataTable({
                    order: [[0, 'desc']]
                });
            }
        });
    }
    const urlParams = new URLSearchParams(window.location.search);
    const clientId = urlParams.get('id');

    $("#client_id").val(clientId);

    
    showAllArticles(clientId);    


    
$("#insert").click(function (e) {
    if ($("#form-data")[0].checkValidity()) {
        e.preventDefault();
        $.ajax({
            url: "../Controllers/articleCrl.php",
            method: "POST",
            data: $("#form-data").serialize() + "&action=insert",
            success: function (response) {
                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: "Article Added Successfully!",
                    showConfirmButton: false,
                    timer: 1500
                });
                $("#addModal").modal('hide');
                $("#form-data")[0].reset();
                showAllArticles(clientId); 
            }
        });
    } else {
        console.log("Form is not valid");
    }
});

$('body').on('click', '.editBtn', function (e) {
    e.preventDefault();
    edit_id = $(this).attr('id');
    $.ajax({
        url: "../Controllers/articleCrl.php",
        type: "POST",
        data: {
            edit_id: edit_id
        },
        success: function (response) {
            try {
                data = JSON.parse(response);

                if (data) {
                    $('#id').val(data.id);
                    $('#title-up').val(data.title);
                    $('#content-up').val(data.content);
                    $('#date-up').val(data.date);
                    $('#client_id-up').val(data.client_id);
                    $('#insurer_id-up').val(data.insurer_id);
                } else {
                    console.error('Invalid data format in the server response');
                }
            } catch (error) {
                console.error('Error parsing JSON response:', error);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error: " + status + " - " + error);
        }
    });
});

$("#update").click(function (e) {
    e.preventDefault();
    if ($("#edit-form-data")[0].checkValidity()) {
        $.ajax({
            url: "../Controllers/articleCrl.php",
            method: "POST",
            data: $("#edit-form-data").serialize() + "&action=update",
            success: function (response) {
                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: "Article Updated Successfully!",
                    showConfirmButton: false,
                    timer: 1500
                });
                $("#editModal").modal('hide');
                $("#edit-form-data")[0].reset();
                showAllArticles(clientId);
            }
        });
    } else {
        console.log("Form is not valid");
    }
});

    $('body').on('click', '.delBtn', function(e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        del_id = $(this).attr('id');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "../Controllers/clientCtl.php",
                    type: 'POST',
                    data: {
                        del_id: del_id
                    },
                    success: function(response) {
                        tr.css('background-color', '#ff6666');
                        Swal.fire(
                            'Deleted',
                            'User deleted successfully !',
                            'success'
                        );
                        showAllArticles(clientId);
                    }
                });
            }
        });

    });

    $('body').on('click', '.infoBtn', function(e) {
        e.preventDefault();
        info_id = $(this).attr('id');
        $.ajax({
            url: "../Controllers/articleCrl.php",
            type: "POST",
            data: {
                info_id: info_id
            },
            success: function(response) {
                data = JSON.parse(response);
                Swal.fire({
                    title: `<pre><strong>Article Info: ID(${data.id})</strong></pre>`,
                    type: 'info',
                    html: `<pre><b>Title: </b> ${data.title}<br><b>Content: </b> ${data.content}<br><b>Date: </b> ${data.date}<br><b>Client ID: </b>${data.client_id}<br><b>Insurer ID: </b>${data.insurer_id}</pre>`,
                });
            }
        });
    });
    

});