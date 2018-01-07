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

	$(".links").on("click", "p span", function() {
		remLink($(this).parent().data("name"));
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

function remLink(name) {
	var data = {name:name}

	$.ajax ( {
		type:"Post",
		data:data,
		url:"remove.php",
		success:function(data) {
			removeLink(data);
		}
	});
}

function placeLink(data) {
	var text = "<p class='load active' data-name='"+data[0]+"'><a href='"+data[1]+"'>"+data[0]+"</a><span>&nbsp;[delete]</span></p>";
	$(".links").append(text);
}

function removeLink(data) {
	$(".links p[data-name='"+data+"']").remove();
}