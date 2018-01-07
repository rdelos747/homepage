// ////////////////////////
// G L O B A L S
// /////////////////////////////////////////
var DELAY = 25;

// ////////////////////////
// I N I T
// /////////////////////////////////////////
$(window).on("load", function() {
	bindClicks();
	loadItems();
});

// ////////////////////////
// F U N C T I O N S
// /////////////////////////////////////////
function loadItems() {
	var i = 0;
	$(".load").each(function() {
		var x = $(this);
		setTimeout(function() {
			x.addClass("active");
		}, DELAY * i);
		i++;
	});
}

function bindClicks() {
	$(".link-add").on("click", ".plus", function() {
		$(this).parent().addClass("active");
		$(this).siblings("input").val("");
	});

	$(".link-add").on("click", ".minus", function() {
		$(this).parent().removeClass("active");
	});

	$(".link-add").on("click", ".submit-link", function() {
		$(this).parent().removeClass("active");
		sendLink($(this).siblings(".new-name").val(), $(this).siblings(".new-addr").val());
	});
}

function sendLink(name, addr) {
	var data = {
		name:name,
		addr:addr
	};

	$.ajax ( {
		type:"Post",
		data:data,
		url:"writejson.php",
		dataType:"json",
		success:function(data) {
			console.log(data);
			placeLink(data);
		}
	});
}

function placeLink(data) {
	var text = "<a href='"+data[1]+"'><p class='load active'>"+data[0]+"</p></a>";
	$(".links").append(text);
}