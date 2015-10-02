<html lang="en">

	<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>HercAdminTool Installation - Step 2</title>

	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<div class="container">
		<div class="row">
			<center>
				<p>First, we need to know a bit about your server. Do you have 1 login server with 2 or more character and map servers?</p>
				<p>Note, this does not mean multiple map servers.</p>
				<p>This simply means that you have perhaps a low and high rate server sharing a login server.</p>
				<input type="radio" name="multichar" id="optionsRadiosInline1" value="Yes" />Yes&nbsp;&nbsp;&nbsp;<input type="radio" name="multichar" id="optionsRadiosInline2" value="No" />No
				<br /><br /><br />
				<p>Now, fill out the following basic information about your server:</p>
				<table class="table">
					<tr>
						<td>
							<label>Server Name</label>
						</td>
						<td>
							<input type="text" name="servername" value="YourRO" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Panel Name</label>
						</td>
						<td>
							<input type="text" name="panelname" value="HercAdminTool" />
						</td>
					</tr>
					<tr>
						<td>
							<label>HAT Path</label>
							<p>Give full path to your HAT installation, include forward and trailing slash</p>
						</td>
						<td>
							<input type="text" name="hat_path" value="/var/www/hat" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Email From</label>
							<p>This is the email address where all mail will appear to come from</p>
						</td>
						<td>
							<input type="email" name="email" value="admin@yourdomain.com" />
						</td>
					</tr>
				</table>
			</center>
		</div>
	</div>
</body>