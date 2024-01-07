$(document).ready(function() {
    showAllUsers();

function showAllUsers() {
$.ajax({
url: "../Controllers/insurerCrl.php",
method: 'POST',
data: {
    action: "view"
},
success: function(response) {
    $("#showUser").html(response);
    $("table").DataTable({
        order: [[0, 'desc']]
    });
}
});
}
    
    $("#insert").click(function(e) {
        if ($("#form-data")[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: "../Controllers/insurerCrl.php",
                method: "POST",
                data: $("#form-data").serialize() + "&action=insert",
                success: function(response) {
                    Swal.fire({
                        position: "center-center",
                        icon: "success",
                        title: "User Added Successfully !",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $("#addModal").modal('hide');
                    $("#form-data")[0].reset();
                    showAllUsers();
                }
            });
        } else {
            console.log("Form is not valid");
        }
    });

    $("body").on("click", ".editBtn", function(e) {
        e.preventDefault();
        edit_id = $(this).attr('id');
        $.ajax({
            url: "../Controllers/insurerCrl.php",
            type: "POST",
            data: {
                edit_id: edit_id
            },
            success: function(response) {
                try {
                    console.log(response);
                    data = JSON.parse(response);

                    if (data) {
                    console.log(data);

                        $('#id').val(data[0]);
                        $('#Name-ed').val(data[1]);
                        $('#Adress-ed').val(data[2]);
                    } else {
                        console.error('Invalid data format in the server response');
                    }
                } catch (error) {
                    console.error('Error parsing JSON response:', error);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
            }
        });
    });

    $("#update").click(function(e) {
        e.preventDefault();
        if ($("#edit-form-data")[0].checkValidity()) {
            $.ajax({
                url: "../Controllers/insurerCrl.php",
                method: "POST",
                data: $("#edit-form-data").serialize() + "&action=update",
                success: function(response) {
                    Swal.fire({
                        position: "center-center",
                        icon: "success",
                        title: "User Updated Successfully !",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $("#editModal").modal('hide');
                    $("#edit-form-data")[0].reset();
                    showAllUsers();
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
                    url: "../Controllers/insurerCrl.php",
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
            url: "../Controllers/insurerCrl.php",
            type: "POST",
            data: {
                info_id: info_id
            },
            success: function(response) {
                data = JSON.parse(response);
                Swal.fire({
                    title: '<pre><strong>User  Info: ID(' + data.id + ')</strong></pre>',
                    type: 'info',
                    html: `<pre><b>First Name: </b> ${data.first_name}<br><b>Last Name:  </b> ${data.last_name}  <br>         <b>  Adress : </b> ${data.adress}<br><b>Phone : </b>${data.phone}</pre>`,
                })
            }
        })
    });

});