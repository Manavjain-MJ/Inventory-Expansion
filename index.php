<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Category Registration</title>
    <link rel="stylesheet" href="indexstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Add Modal -->
    <div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="font-family: auto;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">List New Category</h1>
                    Add & thrive! -->
                    <figure>
                        <h5>List New Category</h5>
                        <figcaption>
                            Add & thrive!
                        </figcaption>
                    </figure>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="error-message">

                                </div>

                            </div>
                            <div class="col-md-5">
                                <label for="">Name</label>
                                <input type="text" class="form-control fname" placeholder="Enter Name">

                            </div>
                            <div class="col-md-5">
                                <label for="">Descrption</label>
                                <textarea name="description" class="form-control description" placeholder="Enter Description"></textarea>
                                <!-- <input type="text" class="form-control description" placeholder="Enter Descrption"> -->

                            </div>

                            <div class="col-md-5">
                                <label for="">Price</label>
                                <input type="number" min="0" class="form-control price" placeholder="Enter Price">

                            </div>

                            <div class="col-md-5">
                                <label for="">Image</label>
                                <input type="file" id="image" class="form-control image" placeholder="Enter Image">

                            </div>
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-5 mt-4" id="image-preview" style="float: right;">
                            </div>

                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-secondary" data-bs-dismiss="modal" id="cancelButton">Cancel</button>
                    <button type="button" class="d-inline-flex focus-ring focus-ring-primary py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-primary addcategory_ajax">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="Categoryeditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="font-family: auto;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tune Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="error-message-update">

                            </div>

                        </div>
                        <div class="col-md-5">
                            <input type="hidden" id="category_id">
                            <label for="">Name</label>
                            <input type="text" id="edit_fname" class="form-control" placeholder="Enter Name">

                        </div>
                        <div class="col-md-5">
                            <label for="">Descrption</label>
                            <textarea name="description" id="edit_description" class="form-control description" placeholder="Enter Description"></textarea>


                        </div>
                        <div class="col-md-5">
                            <label for="">Price</label>
                            <input type="number" min="0" id="edit_price" class="form-control" placeholder="Enter Price">

                        </div>
                        <div class="col-md-5">
                            <label for="">Image</label>
                            <input type="file" id="edit_image" class="form-control e_image" placeholder="Enter Image">

                        </div>
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-5 mt-4" id="preview">

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="d-inline-flex focus-ring focus-ring-primary py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-primary editcategory_ajax">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="Categorydeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="font-family: auto;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category Deletion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="delete_id">
                        <div class="col-md-12">
                            <figure class="text-center mt-3">
                                <blockquote class="blockquote">
                                    <h4>Are Sure you want to delete this Category?</h4>
                                </blockquote>
                                <figcaption>
                                    <p>This product will be removed from your catalog.</p>
                                </figcaption>
                            </figure>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="d-inline-flex focus-ring focus-ring-danger py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-danger deletecategory_ajax">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Data table -->
    <div class="container mt-3" style="font-family: auto;">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 mb-5 rounded" style="background-color: transparent; backdrop-filter: blur(4px);">
                    <div class="card-header border-light p-3 rounded" style="background-color: transparent;">
                        <figure class="text-center mt-3">
                            <blockquote class="blockquote">
                                <h3>Category Creation</h3>
                            </blockquote>
                            <figcaption>
                                <p style="color:#9ad0ff;font-style:italic;">Quickly Add Categories To Your Inventory</p>
                            </figcaption>
                        </figure>
                        <button type="button" class="d-inline-flex focus-ring focus-ring-primary py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-primary" style="float:inline-end;" data-bs-toggle="modal" data-bs-target="#addcategory">Add category</button>
                        <a href="ajaxhome.php" class="d-inline-flex focus-ring focus-ring-light py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-light"><i class="bi bi-house"></i></a>


                    </div>
                </div>
                <div class="card-body rounded">
                    <div class="message-show">

                    </div>
                    <div style="text-align: center;">
                        <table class="table shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="vertical-align:middle">

                            <thead>
                                <tr>
                                    <th hidden>ID</th>
                                    <th>NO.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody class="categorydata">

                            </tbody>
                        </table>

                    </div>



                </div>

            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        getdata();


        $(".deletecategory_ajax").click(function(e) {
            e.preventDefault();
            var category_id = $('#delete_id').val()
            // alert(category_id);
            $('#Categorydeletemodal').modal('hide')
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'checking_delete': true,
                    'category_id': category_id,
                },
                success: function(response) {
                    $('.message-show').append('\
                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                         <strong>Hey!</strong> ' + response + '.\
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                            </div>\
                        ');
                    $('.alert').delay(1000).fadeOut(function() {
                        $(response).remove();
                    });

                    $('.categorydata').html("")
                    getdata();

                }
            });



        });

        $(document).on("click", ".delete_btn ", function() {
            var category_id = $(this).closest('tr').find('.category_id').text();
            $('#delete_id').val(category_id);

            $('#Categorydeletemodal').modal('show');
            // $.ajax({
            //     type: "POST",
            //     url: "code.php",
            //     data: {
            //         'checking_delete': true,
            //         'category_id': category_id,
            //     },
            //     success: function (response) {
            //         $('.message-show').append('\
            //     <div class="alert alert-success alert-dismissible fade show" role="alert">\
            //      <strong>Hey!</strong> ' + response + '.\
            //      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
            //         </div>\
            //     ');
            //             $('.categorydata').html("")
            //             getdata();

            //     }
            // });


        });

        $('.editcategory_ajax').click(function(e) {
            e.preventDefault();

            var category_id = $('#category_id').val();
            var fname = $('#edit_fname').val();
            var description = $('#edit_description').val();
            var image = $('#edit_image')[0].files[0];
            // if (image && image.length > 0) {
            //     image = image[0];
            // } else {
            //     image = '';
            // }
            var price = $('#edit_price').val();

            if (fname != '' && description != '' && image && price != '') {
                var formData = new FormData();
                formData.append('checking_update', true);
                formData.append('category_id', category_id);
                formData.append('fname', fname);
                formData.append('description', description);
                formData.append('image', image);
                formData.append('price', price);

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    // {
                    //     'checking_update': true,
                    //     'category_id': category_id,
                    //     'fname': fname,
                    //     'description': description,
                    //     'image': image,
                    //     'price': price,
                    // },

                    success: function(response) {
                        $('#Categoryeditmodal').modal('hide');
                        $('.message-show').append('\
                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                         <strong>Hey!</strong> ' + response + '.\
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                            </div>\
                        ');
                        $('.alert').delay(1000).fadeOut(function() {
                            $(response).remove();
                        });
                        $('.categorydata').html("")
                        getdata();


                    }
                });

            } else {
                // console.log("Please enter all fields.");
                $('.error-message-update').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                         <strong>Hey!</strong> Please enter all fields.\
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                            </div>\
                        ')
                $('.alert').delay(1000).fadeOut(function() {
                    // $(response).remove();
                });
            }

        });

        $(document).on("click", ".edit_btn", function() {
            var category_id = $(this).closest('tr').find('.category_id').text();

            $('#edit_image').val('');

            // alert(category_id);
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'checking_edit': true,
                    'category_id': category_id,
                },
                success: function(response) {
                    $.each(response, function(key, catedit) {
                        $('#category_id').val(catedit['id']);
                        $('#edit_fname').val(catedit['fname']);
                        $('#edit_description').val(catedit['description']);
                        // $('#edit_image').text(catedit['image']);
                        // console.log(catedit['image']);   
                        $('#edit_price').val(catedit['price']);
                        var imagePath = 'dataimage/' + catedit['image'];
                        $('#preview').html('<img src="' + imagePath + '" width="180" height="110">');

                    });
                    $('#Categoryeditmodal').modal('show');


                }
            });


        });

        $('.addcategory_ajax').click(function(e) {
            e.preventDefault();

            var fname = $('.fname').val();
            var description = $('.description').val();
            var image = $('.image')[0].files[0];
            // if (image && image.length > 0) {
            //     image = image[0];
            // } else {
            //     image = '';
            // }
            var price = $('.price').val();
            // console.log('fname:', fname, 'description:', description, 'image:', image, 'price:', price);
            if (fname != '' && description != '' && image && price != '') {
                var formData = new FormData();
                formData.append('checking_add', true);
                formData.append('fname', fname);
                formData.append('description', description);
                formData.append('image', image);
                formData.append('price', price);

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    // {
                    //     'checking_add': true,
                    //     'fname': fname,
                    //     'description': description,
                    //     'image': image,
                    //     'price': price,
                    // },

                    success: function(response) {
                        $('#addcategory').modal('hide');
                        $('.message-show').append('\
                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                         <strong>Hey!</strong> ' + response + '.\
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                            </div>\
                        ');
                        $('.alert').delay(1000).fadeOut(function() {
                            $(response).remove();
                        });

                        $('.categorydata').html("")
                        getdata();
                        $('.fname').val("");
                        $('.description').val("");
                        $('.image').val("");
                        $('.price').val("");
                        $('#image-preview').html('');

                    }
                });

            } else {
                // console.log("Please enter all fields.");
                $('.error-message').append('\
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                         <strong>Hey!</strong> Please enter all fields.\
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                            </div>\
                        ')
                $('.alert').delay(1000).fadeOut(function() {
                    // $(response).remove();
                });

            }

        });

    });

    $('#cancelButton').click(function() {
        $('.fname').val("");
        $('.description').val("");
        $('.image').val("");
        $('.price').val("");
        $('#image-preview').html('');
    });

    function getdata() {
        $.ajax({
            type: "GET",
            url: "fetch.php",
            // data: "data",
            // dataType: "dataType",
            success: function(response) {
                let counter = 1;
                //  console.log(response);
                $.each(response, function(key, value) {
                    //  console.log(value['fname']);
                    $('.categorydata').append('<tr>' +
                        '<td hidden class = "category_id">' + value['id'] + '</td>\
                                    <td>' + counter + '</td>\
                                    <td><img src=dataimage/' + value['image'] + ' alt="Category Image" width="180px" height="110px" /></td>\
                                    <td>' + value['fname'] + '</td>\
                                    <td>' + value['description'] + ' </td>\
                                    <td>' + value['price'] + '</td>\
                                    <td>\
                                    <div class="d-flex justify-content-between">\
                                        <a href="#" class="d-inline-flex focus-ring focus-ring-info py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-info edit_btn"><i class="bi bi-pencil-square"></i></a>\
                                        <a href="#" class="d-inline-flex focus-ring focus-ring-danger py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-danger delete_btn"><i class="bi bi-trash"></i></a>\
                                         </td>\
                                         </div>\
                                       </tr>');
                    counter++;

                });

            }
        });

    }

    $(document).ready(function() {
        $('.e_image').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                var html = '<img src="' + e.target.result + '" alt="Image Preview" width="180px" height="110px">';
                $('#preview').html(html);
            };
            reader.readAsDataURL(file);
        });
    });

    $(document).ready(function() {
        $('#image').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                var html = '<img src="' + e.target.result + '" alt="Image Preview" width="180px" height="110px">';
                $('#image-preview').html(html);
            };
            reader.readAsDataURL(file);
        });
    });
</script>

</html>