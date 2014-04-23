var CoomingSoon = function () {

    return {
        //main function to initiate the module
        init: function () {

            $.backstretch([
    		        ASSETS_PATH+"img/bg/1.jpg",
    		        ASSETS_PATH+"img/bg/2.jpg",
    		        ASSETS_PATH+"img/bg/3.jpg",
    		        ASSETS_PATH+"img/bg/4.jpg"
    		        ], {
    		          fade: 1000,
    		          duration: 10000
    		    });

            var austDay = new Date();
            austDay = new Date(austDay.getFullYear(), 9 - 1, 1);
            $('#defaultCountdown').countdown({until: austDay});
            $('#year').text(austDay.getFullYear());
        }

    };

}();