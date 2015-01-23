// define(['api', 'jquery', 'underscore'], function(Api, $, _) {

//     describe("API", function() {
        
//         var myapi = API;
//         var originalTimeout;
//         var onSuccess;
//         var onErr;
        
//         beforeEach(function() {
//             originalTimeout = jasmine.DEFAULT_TIMEOUT_INTERVAL;
//             jasmine.DEFAULT_TIMEOUT_INTERVAL = 10000;

//             //spyOn(myapi, 'get_annotations').and.callThrough();
//             onSuccess = jasmine.createSpy('onSuccess');
//             onErr = jasmine.createSpy('onError');
//         });

//         it("should be able to get annotations' list", function(done) {

//             myapi.get_annotations(onSuccess, onErr);
//             //expect(myapi.get_annotations).toHaveBeenCalled(); 

//             setTimeout(function() {
//                 done();
//             }, 5000);
//         });

//         afterEach(function(done) {
//             done();
//             expect(onSuccess).toHaveBeenCalled();
//             expect(onErr).not.toHaveBeenCalled();
//             jasmine.DEFAULT_TIMEOUT_INTERVAL = originalTimeout;
//         });
//     });

// });