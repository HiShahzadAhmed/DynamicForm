<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <section class="toolbox">
        <h3>Toolbox</h3>
        <div class="clearfix">
            <div class="float-left">
                <p>Text Field</p>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-primary btn-sm text-white add-field" data-field="text">+ Add</button>
            </div>
        </div>
        <div class="clearfix">
            <div class="float-left">
                <p>Email Field</p>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-danger btn-sm text-white add-field" data-field="email">+ Add</button>
            </div>
        </div>
        <div class="clearfix">
            <div class="float-left">
                <p>Password Field</p>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-warning btn-sm text-white add-field" data-field="password">+ Add</button>
            </div>
        </div>
        <div class="clearfix">
            <div class="float-left">
                <p>Number Field</p>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-info btn-sm text-white add-field" data-field="number">+ Add</button>
            </div>
        </div>
        <div class="clearfix">
            <div class="float-left">
                <p>Textarea</p>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-success btn-sm text-white add-field" data-field="textarea">+ Add</button>
            </div>
        </div>

        <hr>
        <a href="results.php" target="_blank" class="btn btn-block btn-primary">Results</a>
    </section>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="font-weight-bold">FORM</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 m-auto">
                <form action="" class="form">
                    <div class="fields-outer"></div>

                    <div class="form-group text-center mt-5 submit-div" style="display: none;">
                        <button type="submit" class="btn btn-danger font-weight-bold submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addFieldModal" tabindex="-1" role="dialog" aria-labelledby="addFieldModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFieldModalTitle">Add Field</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="form-group">
                            <label for="">Name of the field</label>
                            <input type="text" class="form-control field_name" name="field_name" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary sure-add">Add</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>

        function showButton() {
            $len = $('.fields-outer .form-group').length;
            if ($len > 0) {
                $(".submit-div").fadeIn();
            } else {
                $(".submit-div").fadeOut();
            }
        }
    
        function convertToSlug(Text) {
            return Text.toLowerCase()
            .replace(/ /g,'_')
            .replace(/[^\w-]+/g,'');
        }

        function appendField(type, name) {
            $elm = $(".fields-outer");
            $id = convertToSlug(name);

            if (type == "text") {
                $html = '<div class="form-group">' +
                            '<div class="clearfix">' +
                                '<div class="float-left"><label for="'+$id+'">'+name+'</label></div>' +
                                '<div class="float-right"><button type="button" class="btn btn-danger btn-sm remove-btn">x</button></div>' +
                            '</div>' +
                            '<input type="text" class="form-control" name="'+$id+'" autocomplete="off" required>' +
                        '</div>';

                $elm.append($html);
            }

            if (type == "email") {
                $html = '<div class="form-group">' +
                            '<div class="clearfix">' +
                                '<div class="float-left"><label for="'+$id+'">'+name+'</label></div>' +
                                '<div class="float-right"><button type="button" class="btn btn-danger btn-sm remove-btn">x</button></div>' +
                            '</div>' +
                            '<input type="email" class="form-control" name="'+$id+'" autocomplete="off" required>' +
                        '</div>';

                $elm.append($html);
            }

            if (type == "password") {
                $html = '<div class="form-group">' +
                            '<div class="clearfix">' +
                                '<div class="float-left"><label for="'+$id+'">'+name+'</label></div>' +
                                '<div class="float-right"><button type="button" class="btn btn-danger btn-sm remove-btn">x</button></div>' +
                            '</div>' +
                            '<input type="password" class="form-control" name="'+$id+'" autocomplete="off" required>' +
                        '</div>';

                $elm.append($html);
            }

            if (type == "number") {
                $html = '<div class="form-group">' +
                            '<div class="clearfix">' +
                                '<div class="float-left"><label for="'+$id+'">'+name+'</label></div>' +
                                '<div class="float-right"><button type="button" class="btn btn-danger btn-sm remove-btn">x</button></div>' +
                            '</div>' +
                            '<input type="number" class="form-control" name="'+$id+'" autocomplete="off" required>' +
                        '</div>';

                $elm.append($html);
            }

            if (type == "textarea") {
                $html = '<div class="form-group">' +
                            '<div class="clearfix">' +
                                '<div class="float-left"><label for="'+$id+'">'+name+'</label></div>' +
                                '<div class="float-right"><button type="button" class="btn btn-danger btn-sm remove-btn">x</button></div>' +
                            '</div>' +
                            '<textarea class="form-control" name="'+$id+'" rows="5" required></textarea>' +
                        '</div>';

                $elm.append($html);
            }

            showButton();
        }

        $(document).on("click", ".add-field", function(e) {
            $("#addFieldModal .sure-add").attr("data-field", $(this).attr("data-field"));
            $("#addFieldModal").modal('show');
        });

        $(document).on("click", ".sure-add", function(e) {
            $type = $(this).attr("data-field");
            $name = $(".field_name").val();
            appendField($type, $name);
            $("#addFieldModal").modal('hide');
            $("#addFieldModal .field_name").val("");
        });

        $(document).on("click", ".remove-btn", function(e) {
            $(this).closest(".form-group").remove();
            showButton();
        });

        $(document).on("submit", ".form", function(e) {
            e.preventDefault();
            $elm = $(this);

            $elm.find(".submit-btn").prop("disabled", true);

            $.ajax({
                type: "POST",
                url: "submit.php",
                data: $elm.serialize(),
                success: function (response) {
                    // console.log(response);
                    $elm.find("input").val("");
                    $elm.find("textarea").val("");
                    $elm.find(".submit-btn").prop("disabled", false);
                }
            });
        });
    </script>
</body>
</html>