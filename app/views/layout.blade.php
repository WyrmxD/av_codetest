<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		{{ HTML::style('css/styles.css'); }}
		{{ HTML::script('js/main.js') }}
		<title>Antevenio Codetest</title>
	</head>
    <body>
    	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js"></script>


        <div class="container-fluid">
			
			<header>
				<div class="row header">
					<div class="col-xs-12">
						<h1>Antevenio Codetest</h1>
					</div>
				</div>
			</header>	
        	
        	@yield('content')

        </div>
    </body>
</html>