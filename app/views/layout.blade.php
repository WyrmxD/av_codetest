<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		{{ HTML::style('css/styles.css'); }}
		<title>Antevenio Codetest</title>
	</head>
    <body>
        <div class="container-fluid">
			
			<header>
				<div class="row header">
					<div class="col-xs-12">
						<h1>Antevenio Codetest</h1>
					</div>
				</div>
			</header>	
        	
        	<div id="content">
        		
        	</div>

        </div>

		<!-- Templates -->
		<script type="text/template" id="item_template"></script>

		<script type="text/template" id="annotations_template">
			<table class="table striped">
				<thead>
					<tr>
						<th>Description</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
					<% _.each(annotations, function(annotation) {%>
						<tr>
							<td><%= annotation.description %></td>
							<td><%= annotation.amount %></td>
						</tr>
					<% }); %>
				</tboy>
			</table>
		</script>

		<script type="text/template" id="new_annotation_template">
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2">
					<h2>New invoice</h2>

					<input id="ann_description" class="input_large" type="text" placeholder="Description">
					<input id="ann_amount" type="text" placeholder="0.0">
					<button id="add_annotation" type="submit" class="btn btn-default">Add</button>
				</div>
			</div>
		</script>

		<script type="text/template" id="home-template">
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2">

				</div>
			</div>
		</script>

		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js"></script>
		<script src="http://localhost:8000/js/main.js"></script>

    </body>
</html>