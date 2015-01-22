define(['api', 'jquery', 'underscore'], function(Api, $, _) {

    describe("API", function() {
        
        var myapi = API;
        var originalTimeout;
        var onSuccess;
        var onError;
        
        beforeEach(function() {
            originalTimeout = jasmine.DEFAULT_TIMEOUT_INTERVAL;
            jasmine.DEFAULT_TIMEOUT_INTERVAL = 10000;

            //spyOn(myapi, 'get_annotations').and.callThrough();
            onSuccess = jasmine.createSpy('onSuccess');
            onError = jasmine.createSpy('onError');
        });

        it("should be able to get annotations' list", function(done) {

            myapi.get_annotations(onSuccess, onError);
            //expect(myapi.get_annotations).toHaveBeenCalled(); 

            setTimeout(function() {
                done();
            }, 5000);
        });

        afterEach(function(done) {
            expect(onSuccess).toHaveBeenCalled();
            expect(onError).toHaveBeenCalled();
            //done();
            jasmine.DEFAULT_TIMEOUT_INTERVAL = originalTimeout;
        });
    });

});