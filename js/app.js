// Our custom widget which handles the tooltips and data attributes
$.widget('attrdemo.hoverplugin', {
    options: {
        "age": "",
        "email": ""
    },

    _init: function() {
        var state = this;
        var thisRow = this.element[0];

        // IMPORTANT
        // Here we finally see how the data-attributes are used. We simply call the .attr() function on
        // our row with data-age and data-email attributes to get our data. Now, data we collected 
        // to output our table originally can be re-used instead of further fetches with AJAX to do fancy
        // popups and wotnot later on with JavaScript
        this.options.age = $(thisRow).attr('data-age');
        this.options.email = $(thisRow).attr('data-email');

        // When we hover over a row, show a tooltip with this user's age and email (which are data attributes
        // on the row)
        $(thisRow).hover(function(){
            $(thisRow).tooltip({
                title: "Age: "+state.options.age+" Email: "+state.options.email,
                placement: "right"
            });
        });
    }
});