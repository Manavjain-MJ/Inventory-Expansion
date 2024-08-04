<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Up: Add a New Product</title>
    <link rel="stylesheet" href="itemhomestyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Add Modal -->
    <div class="modal fade" id="Additem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-family: auto;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <figure>
                        <h1 class="modal-title fs-5" id="exampleModalLabel">List New Product</h1>
                        <!-- <h5>List New Category</h5>  -->
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
                                <input type="text" name="item_fname" class="form-control item_fname" placeholder="Enter Name">

                            </div>
                            <div class="col-md-5">
                                <label for="">Descrption</label>
                                <textarea name="item_description" class="form-control item_description" placeholder="Enter Description"></textarea>                       
                            </div>
                            <div class="col-md-5">
                                <label for="">Category</label>
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "ajaxcrud");
                                $query = "SELECT * FROM ajaxcategory";
                                $run = mysqli_query($conn, $query);

                                ?>
                                <select name="item_category" class="form-select item_category">
                                    <option value="">Select Category</option>

                                    <?php
                                    while ($data = mysqli_fetch_array($run)) {
                                        echo "<option value='$data[1]'>$data[1]</option>";
                                    }

                                    ?>
                                    <!-- <input type="text" class="form-control item_category" placeholder="Enter Category"> -->
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="">Price</label>
                                <input type="number" min="0" name="item_price" class="form-control item_price" placeholder="Enter Price">

                            </div>
                            <div class="col-md-5">

                                <label for="">Image</label>
                                <input type="file" id="image" class="form-control item_image">

                            </div>
                            <div class="col-md-5 mt-4 item_image_preview" id="image-preview">
                                <!-- <div id="image-preview" class="item_image_preview"></div>    -->

                            </div>

                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-secondary" data-bs-dismiss="modal" id="cancelButton">Cancel</button>
                    <button type="button" class="d-inline-flex focus-ring focus-ring-primary py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-primary additem_ajax">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="Itemeditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-family: auto;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tune Inventory</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="error-message-update">

                                </div>

                            </div>
                            <div class="col-md-5">
                                <input type="hidden" id="item_id">
                                <label for="">Name</label>
                                <input type="text" id="item_edit_fname" class="form-control" placeholder="Enter Name">

                            </div>
                            <div class="col-md-5">
                                <label for="">Descrption</label>
                                <textarea id="item_edit_description" class="form-control" placeholder="Enter Description"></textarea>                       


                            </div>
                            <div class="col-md-5">
                                <label for="">Category</label>
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "ajaxcrud");
                                $query = "SELECT * FROM ajaxcategory";
                                $run = mysqli_query($conn, $query);

                                ?>
                                <select name="" id="item_edit_category" class="form-select">
                                    <option value="">Select Category</option>

                                    <?php
                                    while ($data = mysqli_fetch_array($run)) {
                                        echo "<option value='$data[1]'>$data[1]</option>";
                                    }

                                    ?>
                                    <!-- <input type="text" class="form-control item_category" placeholder="Enter Category"> -->
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="">Price</label>
                                <input type="number" min="0" id="item_edit_price" class="form-control" placeholder="Enter Price">

                            </div>
                            <div class="col-md-5">
                                <label for="">Image</label>
                                <input type="file" id="item_edit_image" class="form-control e_image">
                                
                                

                            </div>
                            <div id="preview" class="col-md-5 mt-4 item_image_preview">
                                <!-- <img id="item_edit_image" src="" alt="Edit Image" width="100px" height="100px"> -->
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="d-inline-flex focus-ring focus-ring-primary py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-primary edititem_ajax">Update</button>
                        </div>

                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="Itemdeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-family: auto;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Deletion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="item_delete_id">
                        <div class="col-md-12">
                            <figure class="text-center mt-3">
                                <blockquote class="blockquote">
                                    <h4>Are Sure you want to delete this Product?</h4>
                                </blockquote>
                                <figcaption>
                                    <p>This product will be removed from your catalog.</p>
                                </figcaption>
                            </figure>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="d-inline-flex focus-ring focus-ring-secondary py-1 px-2 text-decoration-none border rounded btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="d-inline-flex focus-ring focus-ring-danger py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-danger deleteitem_ajax">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3" style="font-family: auto;">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 mb-5 rounded" style="background-color: transparent; backdrop-filter: blur(4px);">
                    <div class="card-header border-light p-3 rounded" style="background-color: transparent; backdrop-filter: blur(4px);">
                        <figure class="text-center mt-3">
                            <blockquote class="blockquote">
                                <h3>Product Addition</h3>
                            </blockquote>
                            <figcaption>
                                <p style="color:#9ad0ff;font-style:italic;"> Quickly add products to your inventory</p>
                            </figcaption>
                        </figure>
                        <button type="button" class="d-inline-flex focus-ring focus-ring-primary py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-primary" style="float: inline-end;" data-bs-toggle="modal" data-bs-target="#Additem">Add Product</button>
                        <a href="ajaxhome.php" class="d-inline-flex focus-ring focus-ring-light py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-light"><i class="bi bi-house"></i></a>
                        <!-- <h4>Product Addition -->
                        <!-- </h4> -->
                        <!-- <p><em>Quickly add products to your inventory.</em></p> -->
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
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody class="itemdata">

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        getdata();



        $(".deleteitem_ajax").click(function(e) {
            e.preventDefault();
            var item_id = $('#item_delete_id').val()
            // alert(category_id);
            $('#Itemdeletemodal').modal('hide')
            $.ajax({
                type: "POST",
                url: "itemcode.php",
                data: {
                    'checking_delete': true,
                    'item_id': item_id,
                },
                success: function(response) {
                    $('.message-show').append('\
                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                         <strong>Hey !</strong> ' + response + '.\
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                            </div>\
                        ');
                    $('.alert').delay(1000).fadeOut(function() {
                        $(response).remove();
                    });

                    $('.itemdata').html("")
                    getdata();

                }
            });



        });

        $(document).on("click", ".delete_btn ", function() {
            var item_id = $(this).closest('tr').find('.item_id').text();
            $('#item_delete_id').val(item_id);

            $('#Itemdeletemodal').modal('show');
            // $.ajax({
            //     type: "POST",
            //     url: "itemcode.php",
            //     data: {
            //         'checking_delete': true,
            //         'item_id': item_id,
            //     },
            //     success: function (response) {
            //         $('.message-show').append('\
            //     <div class="alert alert-success alert-dismissible fade show" role="alert">\
            //      <strong>Hey!</strong> ' + response + '.\
            //      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
            //         </div>\
            //     ');
            //             $('.itemdata').html("")
            //             getdata();

            //     }
            // });


        });

        $('.edititem_ajax').click(function(e) {
            e.preventDefault();

            var item_id = $('#item_id').val();
            var item_fname = $('#item_edit_fname').val();
            var item_description = $('#item_edit_description').val();
            var item_category = $('#item_edit_category').val();
            var item_image = $('#item_edit_image')[0].files[0];
            var item_image = $('#item_edit_image')[0].files;
            if (item_image && item_image.length > 0) {
                item_image = item_image[0];
            } else {
                item_image = '';
            }
            var item_price = $('#item_edit_price').val();

            if (item_fname != '' & item_description != '' & item_category != '' & item_image != '' & item_price != '') {

                var formData = new FormData();
                formData.append('checking_update', true);
                formData.append('item_id', item_id);
                formData.append('item_fname', item_fname);
                formData.append('item_description', item_description);
                formData.append('item_category', item_category);
                formData.append('item_image', item_image);
                formData.append('item_price', item_price);
                $.ajax({
                    type: "POST",
                    url: "itemcode.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    //  {
                    //     'checking_update': true,
                    //     'item_id': item_id,
                    //     'item_fname': item_fname,
                    //     'item_description': item_description,
                    //     'item_category': item_category,
                    //     'item_image': item_image,
                    //     'item_price': item_price,
                    // },

                    success: function(response) {
                        $('#Itemeditmodal').modal('hide');
                        $('.message-show').append('\
                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                         <strong>Hey!</strong> ' + response + '.\
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                            </div>\
                        ');
                        $('.alert').delay(1000).fadeOut(function() {
                            $(response).remove();
                        });
                        $('.itemdata').html("")
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
                    $(response).remove();
                })
            }

        });

        $(document).on("click", ".edit_btn", function() {
            var item_id = $(this).closest('tr').find('.item_id').text();
            // alert(category_id);
            $('#item_edit_image').val('');

            $.ajax({
                type: "POST",
                url: "itemcode.php",
                data: {
                    'checking_edit': true,
                    'item_id': item_id,
                },
                success: function(response) {
                    $.each(response, function(key, itemedit) {
                        $('#item_id').val(itemedit['id']);
                        $('#item_edit_fname').val(itemedit['item_fname']);
                        $('#item_edit_description').val(itemedit['item_description']);
                        $('#item_edit_category').val(itemedit['item_category']);
                        $('#item_edit_price').val(itemedit['item_price']);

                        var imagePath = 'image/' + itemedit['updimage'];
                        $('#preview').html('<img src="' + imagePath + '" width="180" height="105">');

                    });
                    $('#Itemeditmodal').modal('show');





                }
            });


        });

        

        $('.additem_ajax').click(function(e) {
            e.preventDefault();

            var item_fname = $('.item_fname').val();
            var item_description = $('.item_description').val();
            var item_category = $('.item_category').val();
            var item_image = $('.item_image')[0].files[0];
            // if (item_image && item_image.length > 0) {
            //     item_image = item_image[0].files[0];
            // } else {
            //     item_image = '';
            // }
            var item_price = $('.item_price').val();




            if (item_fname != '' && item_description != '' && item_category != '' && item_image && item_price != '') {
                var formData = new FormData();
                formData.append('checking_add', true);
                formData.append('item_fname', item_fname);
                formData.append('item_description', item_description);
                formData.append('item_category', item_category);
                formData.append('item_image', item_image);
                formData.append('item_price', item_price);
                $.ajax({
                    type: "POST",
                    url: "itemcode.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    // {
                    //     'checking_add': true,
                    //     'item_fname': item_fname,
                    //     'item_description': item_description,
                    //     'item_category': item_category,
                    //     'item_image': item_image,
                    //     'item_price': item_price,
                    // },

                    success: function(response) {
                        
                        $('.message-show').append('\
                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                         <strong>Hey!</strong> ' + response + ' \
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                            </div>\
                        ');

                        $('.alert').delay(1000).fadeOut(function() {
                            $(response).remove();

                        });
                        $('#Additem').modal('hide');
                        // $('body').removeClass('modal-open');
                        // $('.modal-backdrop').remove();
                        
                            $('.itemdata').html("")
                           
                            $('.item_fname').val("");
                            $('.item_description').val("");
                            $('.item_category').val("");
                            $('.item_image').val("");
                            $('.item_price').val("");
                            $('#image-preview').html('');
                            
                            getdata();

                         

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
                    $(response).remove();
                });
                // $('#Additem')[0].reset();
                // $('.item_image_preview').html('');

            }
        });

    });

    $('#cancelButton').click(function() {
        $('.item_fname').val("");
        $('.item_description').val("");
        $('.item_category').val("");
        $('.item_image').val("");
        $('.item_price').val("");
        $('#image-preview').html('');
    });

    function getdata() {
        $.ajax({
            type: "GET",
            url: "itemfetch.php",
            // dataType: "json",
            success: function(response) {
                let counter = 1;
                // console.log(response); 
                $.each(response, function(key, value) {
                    //  console.log(value['fname']);
                    $('.itemdata').append('<tr>' +
                        '<td hidden class = "item_id">' + value['id'] + '</td>\
                                    <td>' + counter + '</td>\
                                    <td><img src=image/' + value['updimage'] + ' alt="Item Image" width="180px" height="110px"/></td>\
                                    <td>' + value['item_fname'] + '</td>\
                                    <td>' + value['item_description'] + ' </td>\
                                    <td>' + value['item_category'] + ' </td>\
                                    <td>' + value['item_price'] + '</td>\
                                    <td>\
                                    <div class="d-flex justify-content-between">\
                                        <a href="#" class="btn d-inline-flex focus-ring focus-ring-info py-1 px-2 text-decoration-none border rounded-2 btn btn-outline-info edit_btn" ><i class="bi bi-pencil-square"></i></a>\
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
                var html = '<img src="' + e.target.result + '" alt="Image Preview" width="180px" height="105px">';
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
                var html = '<img src="' + e.target.result + '" alt="Image Preview" width="180px" height="105px">';
                $('#image-preview').html(html);
            };
            reader.readAsDataURL(file);
        });
    });
</script>



</html>