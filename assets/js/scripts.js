    $(document).ready(function() {
     
		$(".sponsore-carousel").owlCarousel({
			    navigation : true,
			navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
		});
		$('.selectpicker').selectpicker({
		  style: 'btn-default',
		  size: 6
		});

		// count up Users
    var usersNumber = $('.users').data("number");
    var postedNumber = $('.posted').data("number");
    var completedNumber = $('.completed').data("number");

        $('.users').countTo({
            from: 50,
            to: usersNumber,
            speed: 5000,
            refreshInterval: 50,
            onComplete: function(value) {
                console.debug(this);
            }
        });

		// count up Posted
		$('.posted').countTo({
            from: 50,
            to: postedNumber,
            speed: 5000,
            refreshInterval: 50,
            onComplete: function(value) {
                console.debug(this);
            }
        });

		// count up Completed
		$('.completed').countTo({
            from: 50,
            to: completedNumber,
            speed: 5000,
            refreshInterval: 50,
            onComplete: function(value) {
                console.debug(this);
            }
        });

    });