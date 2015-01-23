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
		<script type="text/template" id="annotations_template">
			<nav>
				<div class="row">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<a href="#/new" class="btn btn-primary" >New Annotation</a>
					</div>
				</div>
			</nav>
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2">
					<table class="table striped">
						<thead>
							<tr>
								<th>Description</th>
								<th>Amount</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<% _.each(annotations, function(annotation) {%>
								<tr>
									<td><%= annotation.get('description') %></td>
									<td><%= annotation.get('amount') %></td>
									<td><a href="#/edit/<%= annotation.get('id')%>" class="btn btn-default">Edit</a></td>
								</tr>
							<% }); %>
						</tboy>
					</table>
				</div>
			</div>
		</script>

		<script type="text/template" id="edit_annotation_template">
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2">
					<form class="edit_annotation_form">
						<legend><%= annotation ? 'Edit ' : 'Create new ' %>annotation</legend>
						<input name="description" class="input_large" type="text" placeholder="Description" value="<%= annotation ? annotation.get('description') : '' %>">
						<input name="amount" type="text" placeholder="0.0" value="<%= annotation ? annotation.get('amount') : '' %>">
						<button type="submit" class="btn btn-default"><%= annotation ? 'Update' : 'Add' %></button>
						<% if (annotation) { %>
							<input name="id" type="hidden" value="<%= annotation.get('id') %>">
							<button type="submit" class="btn btn-warning delete">Delete</button>
						<% } %>
					</form>
				</div>
			</div>
			<div id="message_container" class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2 message">
					<p>Error:</p>
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