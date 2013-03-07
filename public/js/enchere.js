(function($){

	var socket = io.connect('http://localhost:1337');
	var enventBidsId = {};
	var bid = false;
	var userID;

	socket.on('newUser',function(userId){
		userID = userId;
	})
	socket.on('newBid',function(idBid){
		$('body').append('<div class="' + idBid + '" class="enchere"><p><span class="mm">MM</span>m<span class="ss">SS</span>s</p><input class="' + idBid + '" value="Encherir" type="submit"></div>');
		$('input.' + idBid).click(function(){
			socket.emit('bid', idBid,userID);
		})
	})
	socket.on('existantBid', function(bid){
		$('body').append('<div class="' + bid.id + '" class="enchere"><p><span class="mm">MM</span>m<span class="ss">SS</span>s</p><input class="' + bid.id + '" value="Encherir" type="submit"></div>');
		$('input.' + bid.id).click(function(){
			socket.emit('bid', bid.id,userID);
		})
	})
	socket.on('decrementation',function(bids,idBid){
		for(i = 0; i <= idBid; i++){
			$('.' + i + ' .mm').html(bids[i].minutes);
			$('.' + i + ' .ss').html(bids[i].seconds);
		}
	})

	$('#newBid').submit(function(event){
		event.preventDefault();
		var duration = {};
		duration.seconds = $('input[name="seconds"]').val();
		duration.minutes = $('input[name="minutes"]').val();
		duration.hours = $('input[name="hours"]').val();
		duration.days = $('input[name="days"]').val();
		var bid = true;
		socket.emit('newBid', duration,userID);
	})

	socket.on('results', function(winner){
		if(winner == userID){
			alert('You win!!')
		}else if(winner != userID){
			alert('Looser -_-\'')
		}else{
			alert('Nobody win')
		}

	})


})(jQuery);