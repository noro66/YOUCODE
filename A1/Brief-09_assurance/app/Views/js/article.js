$(document).ready(function() {

function showAllArticles(client_id) {
    $.ajax({
        url: "../Controllers/articleCtl.php",
        method: 'POST',
        data: {
            action: "view",
            client_id: client_id
        },
        success: function (response) {
            $("#showUser").html(response);
            $("table").DataTable({
                order: [[0, 'desc']]
            });
        }
    });
}


    
$("#insert").click(function (e) {
    if ($("#form-data")[0].checkValidity()) {
        e.preventDefault();
        $.ajax({
            url: "../Controllers/articleCtl.php",
            method: "POST",
            data: $("#form-data").serialize() + "&action=insert",
            success: function (response) {
                // Update success message and other actions
                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: "Article Added Successfully!",
                    showConfirmButton: false,
                    timer: 1500
                });
                $("#addModal").modal('hide');
                $("#form-data")[0].reset();
                showAllArticles(); // Update function name
            }
        });
    } else {
        console.log("Form is not valid");
    }
});

    // Update functionality
$('body').on('click', '.editBtn', function (e) {
    e.preventDefault();
    edit_id = $(this).attr('id');
    $.ajax({
        url: "../Controllers/articleCtl.php",
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
            url: "../Controllers/articleCtl.php",
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
                showAllArticles();
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
                        showAllUsers();
                    }
                });
            }
        });

    });

    $('body').on('click', '.infoBtn', function(e) {
        e.preventDefault();
        info_id = $(this).attr('id');
        $.ajax({
            url: "../Controllers/clientCtl.php",
            type: "POST",
            data: {
                info_id: info_id
            },
            success: function(response) {
                data = JSON.parse(response);
                Swal.fire({
                    title: '<pre><strong>User  Info: ID(' + data.id + ')</strong></pre>',
                    type: 'info',
                    html: `<pre><b>First Name: </b> ${data.first_name}<br><b>Last Name:  </b> ${data.last_name}  <br>         <b>  Adress : </b> ${data.adress}<br><b>Phone : </b>${data.phone}</br></pre>`,
                })
            }
        })
    });

});