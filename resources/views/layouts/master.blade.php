<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel assignment</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
    </head>

    <body>
        <div class="main_div_admin container">
            <div class="main_inner">
                <div class="row no-gutters">

                    <div class="col-sm-12">
                        <div class="main_portion_contant_and_side-bar">
                            <div class="contant_div_main" id="toggle_contant">
                                <div class="my_container">
                                    @yield('content')                            		
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        @yield('scripts')

        <script> 
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>

    </body>
</html>