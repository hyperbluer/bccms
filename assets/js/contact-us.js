var ContactUs = function () {

    return {
        //main function to initiate the module
        init: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
	            lat: 30.5931,
				lng: 114.3054,
			  });
			   var marker = map.addMarker({
		            lat: 30.5931,
					lng: 114.3054,
		            title: '湖北省武汉市',
		            infoWindow: {
		                content: "湖北省武汉市"
		            }
		        });

			   marker.infoWindow.open(map, marker);
			});
        }
    };

}();