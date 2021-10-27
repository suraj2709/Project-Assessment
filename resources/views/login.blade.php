<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel assignment - Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="main_block_login">
	<div class="main_block_login_inner">
		<div class="login_div">
			<div class="heading">
			</div>
			<div class="details">
        
					<div class="row">
						<div class="col-sm-12">
						   <div class="button">
						   	<a href="{{ route('login.provider', 'google') }}"><button type="button">Login with Google <i class="fa fa-sign-in"></i></a></button>
						   </div>
						</div>
					</div>

			</div>
		</div>
	</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>