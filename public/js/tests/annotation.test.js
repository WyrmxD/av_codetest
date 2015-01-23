define(['backbone', 'jquery', 'underscore', 'app'], function(Backbone, $, _, App) {

	describe('Backbone', function() {
		it('should be loaded', function() {
		    expect(Backbone).toBeDefined();
		});
	});

	describe('Annotation.Model', function() {
		it('should be defined', function() {
		    expect(AnnotationList.Model).toBeDefined();
		});
	});

	// describe('AnnotationList.Models.Annotation', function() {
	// 	it('should be defined', function() {
	// 	    expect(AnnotationList.Models.Annotation).toBeDefined();
	// 	});

	// 	it('can be instantiated', function() {
	// 	    var task = new AnnotationList.Models.Annotation();
	// 	    expect(task).not.toBeNull();
	// 	});
	// });

});