$(document).ready(function() {
	$(".fancybox")
	    .attr('rel', 'gallery')
	    .fancybox({
	        beforeLoad: function() {
	            var el, id = $(this.element).data('title-id');

	            if (id) {
	                el = $('#' + id);
	            
	                if (el.length) {
	                    this.title = el.html();
		            }
		        }
		    }
	    });

});