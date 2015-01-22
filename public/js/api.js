 
API = {};
(function(ns){

	// var base_url = window.location.origin;
	var base_url = 'http://localhost:8000';


	ns.get_annotations = function(onSuccess, onError) {
		$.ajax({
			type: 'get',
			url: base_url + '/annotation',
			success: onSuccess,
			error: onError
		});
	}

}(API));