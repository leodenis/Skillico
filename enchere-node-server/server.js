var http = require('http');
var mysql = require('mysql');
var connection = mysql.createConnection({
	host:'localhost',
	user:'root',
	password:'',
});
connection.connect();

httpServer = http.createServer(function(req, res){
	console.log('Connection made');
});

httpServer.listen(1337);
var io = require('socket.io').listen(httpServer);
var idBid = 0;
var temps = 432000000;
var bids ={};
var interval = {};
var userInc = -1;
var users={};
var initBid
bids[0] = {};
bids[0].id = 0;
bids[0].seconds = 0;
bids[0].minutes = 0;
bids[0].hours = 0;
bids[0].days = 365;
bids[0].end = false;
bids[0].interval = setInterval(function(){interval = new decrementation(idBid)},(1000))
bids[0].interval;

function decrementation(idOffer){
	for(i in bids){
		if(bids[i].seconds == 0 && bids[i].minutes == 0 && bids[i].hours == 0 && bids[i].days != 0 && bids[i].end == false){
			bids[i].days -= 1;
			bids[i].hours = 23;
			bids[i].minutes = 59;
			bids[i].seconds = 59;
		}
		else if(bids[i].seconds == 0 && bids[i].minutes == 0 && bids[i].hours != 0 && bids[i].end == false){
			bids[i].hours -= 1;
			bids[i].minutes = 59;
			bids[i].seconds = 59;
		}
		else if(bids[i].seconds == 0 && bids[i].minutes != 0 && bids[i].end == false){
			bids[i].minutes -= 1;
			bids[i].seconds = 59;
		}
		else if (bids[i].end != true && bids[i].seconds == 0 && bids[i].minutes == 0 && bids[i].hours == 0 && bids[i].days == 0) {
			bids[i].end = true;
			console.log()
			// connection.connect();
			connection.query('UPDATE  `skillico`.`offer` SET  `price` =  "'+bids[i].price+'", `visibility` =  "1", `fk_id_users_respond` = "'+bids[i].winnerId+'" WHERE  `offer`.`id_offer` ='+bids[i].id+';', function(err, rows, fields) {
			});
			clearInterval(bids[i].interval);
		}
		else if(bids[i].end == false){
			bids[i].seconds -= 1;
		}
		io.sockets.emit('decrementation',bids,bids[i].id);
	}
}
io.sockets.on('connection', function(socket){

	for(var k in bids){
		socket.emit('existantBid', bids[k]);
	}

	socket.on('bid', function(idBid,user){
		if(bids[idBid].price>0){
			var idtemp = bids[idBid].ihistory;
			bids[idBid].history[idtemp] = {};
			bids[idBid].history[idtemp].name = user.name;
			bids[idBid].history[idtemp].hour = new Date().getTime();
			bids[idBid].price -= 0.50;
			bids[idBid].history[idtemp].price = bids[idBid].price;
			bids[idBid].ihistory += 1;
		}
		bids[idBid].winnerId = user.id_users;
	})
	socket.on('newBid',function(duration,idOffer,price){
		bids[idOffer] = {};
		bids[idOffer].id = idOffer;
		bids[idOffer].seconds = duration.seconds;
		bids[idOffer].minutes = duration.minutes;
		bids[idOffer].hours = duration.hours;
		bids[idOffer].days = duration.days;
		bids[idOffer].price = price;
		bids[idOffer].end = false;
		bids[idOffer].ihistory = 1;
		bids[idOffer].history = {};
		bids[idOffer].interval = setInterval(function(){interval = new decrementation(idOffer)},(temps))
		bids[idOffer].interval;
	})

})