describe("API", function() {

    var myapi = API;

    it("should be able to get annotations' list", function(){
        var annotations = myapi.get_anotations();
        expect(annotations).not.toBeNull();
    });

});