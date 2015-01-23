$(function(){

	var Annotations = Backbone.Collection.extend({
		url: '/list'
	});

	var  AnnotationList = Backbone.View.extend({
		el: '#content',

		render: function() {
			var that = this;
			var annotations = new Annotations();
			API.get_annotations(onSuc, onErr);

			function onSuc(annotations) {
				var data = {annotations: annotations};
				console.log(data);
				var template = _.template($("#annotations_template").html());
				var html = template(data);

				that.$el.html(html);
			}

			function onErr(data) {
				console.log('Error');
			}
		}
	});
	var annotationList = new AnnotationList();

	var Router = Backbone.Router.extend({
		routes: {
			'': 'home'
		}
	});
	var router = new Router();
	router.on('route:home', function(){
		//var home_view = new HomeView({ el: $("#content") });
		annotationList.render();
	});

	Backbone.history.start();

});