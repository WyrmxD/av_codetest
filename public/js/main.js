$(function(){

	$.fn.serializeObject = function() {
		var o = {};
		var a = this.serializeArray();
		$.each(a, function() {
		  if (o[this.name] !== undefined) {
		      if (!o[this.name].push) {
		          o[this.name] = [o[this.name]];
		      }
		      o[this.name].push(this.value || '');
		  } else {
		      o[this.name] = this.value || '';
		  }
		});
		return o;
	};

	/* Collections & Models */

	var Annotations = Backbone.Collection.extend({
		url: '/annotation'
	});

	var Annotation = Backbone.Model.extend({
		urlRoot: '/annotation'
	});


	/* Views */

	var  AnnotationList = Backbone.View.extend({
		el: '#content',

		render: function() {
			var that = this;
			var annotations = new Annotations();
			annotations.fetch({
				success: function(annotations) {
					var data = {annotations: annotations.models};
					var template = _.template($("#annotations_template").html());
					var html = template(data);

					that.$el.html(html);	
				}
			});
		}
	});

	var EditAnnotation = Backbone.View.extend({
		el: '#content',

		render: function(options) {
			var that = this;
			if (options.id) {
				that.annotation = new Annotation({id: options.id});
				that.annotation.fetch({
					success: function(annotation) {
						var template = _.template($("#edit_annotation_template").html());
						that.$el.html(template({annotation: annotation}));
					},
					error: function() {
						console.log('Error fetching annotations');
					}
				})
			} else {
				var template = _.template($("#edit_annotation_template").html());
				this.$el.html(template({annotation: null}));
			}
		},

		events: {
			'submit .edit_annotation_form': 'saveAnnotation',
			'click .delete': 'deleteAnnotation'
		},

		saveAnnotation: function(ev) {
			var that = this;
			var annotationDetails = $(ev.currentTarget).serializeObject();
			var annotation = new Annotation();
			annotation.save(annotationDetails, {
				success: function(annotation) {
					router.navigate('', {trigger: true});
				},
				error: function(data) {
					var msg = "Wrong parameters: 'description' should be a string and 'amount' a float number, ie: 100.1 ";
					that.showError(msg);
				}
			})
			return false;
		},

		showError: function(msg) {
			var message_container = $('#message_container');
			$('.message').html(msg);
			message_container.fadeIn(1000).delay(8000).fadeOut(1000);
		},

		deleteAnnotation: function(ev) {
			this.annotation.destroy({
				success: function() {
					router.navigate('', {trigger: true});
				}
			});
			return false;
		}

	});

	/* Routes */

	var Router = Backbone.Router.extend({
		routes: {
			'': 'home',
			'new': 'editAnnotation',
			'edit/:id': 'editAnnotation'
		}
	});
	
	var annotationList = new AnnotationList();
	var editAnnotation = new EditAnnotation();

	var router = new Router();

	router.on('route:home', function(){
		annotationList.render();
	});

	router.on('route:editAnnotation', function(id){
		editAnnotation.render({id: id});
	});

	Backbone.history.start();

});