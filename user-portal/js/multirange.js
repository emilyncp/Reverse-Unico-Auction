(function() {

var supportsMultiple = self.HTMLInputElement && "valueLow" in HTMLInputElement.prototype;

var descriptor = Object.getOwnPropertyDescriptor(HTMLInputElement.prototype, "value");

self.multirange = function(input) {
	if (supportsMultiple || input.classList.contains("multirange")) {
		return;
	}

	var values = input.getAttribute("value").split(",");
	var min = +input.min || 0;
	var max = +input.max || 100;
	var ghost = input.cloneNode();

	input.classList.add("multirange", "original");
	ghost.classList.add("multirange", "ghost");

	input.value = values[0] || min + (max - min) / 2;
	ghost.value = values[1] || min + (max - min) / 2;

	input.parentNode.insertBefore(ghost, input.nextSibling);

	Object.defineProperty(input, "originalValue", descriptor.get ? descriptor : {
		// Fuck you Safari >:(
		get: function() { return this.value; },
		set: function(v) { this.value = v; }
	});

	Object.defineProperties(input, {
		valueLow: {
			get: function() { return Math.min(this.originalValue, ghost.value); },
			set: function(v) { this.originalValue = v; },
			enumerable: true
		},
		valueHigh: {
			get: function() { return Math.max(this.originalValue, ghost.value); },
			set: function(v) { ghost.value = v; },
			enumerable: true
		}
	});

	if (descriptor.get) {
		// Again, fuck you Safari
		Object.defineProperty(input, "value", {
			get: function() { return this.valueLow + "," + this.valueHigh; },
			set: function(v) {
				var values = v.split(",");
				this.valueLow = values[0];
				this.valueHigh = values[1];
			},
			enumerable: true
		});
	}

	function update() {
		ghost.style.setProperty("--low", 100 * ((input.valueLow - min) / (max - min)) + 1 + "%");
		ghost.style.setProperty("--high", 100 * ((input.valueHigh - min) / (max - min)) - 1 + "%");
		var start="";
		var end="";
		if(input.valueLow==0 ||  input.valueLow==24)
		{
			start="12:00 AM";
		}
		else if(input.valueLow<=11.5)
		{
			if(input.valueLow % 1 === 0)
			{
				start=input.valueLow+":00 AM";
			}
			else
			{
				start=Math.floor(input.valueLow)+":30 AM";
			}			
		}
		else if(input.valueLow==12)
		{
			start="12:00 PM";
		}
		else if(input.valueLow==12.50)
		{
			start="12:30 PM";
		}
		else
		{
			if(input.valueLow % 1 === 0)
			{
				start=input.valueLow-12+":00 PM";
			}
			else
			{
				start=Math.floor(input.valueLow)-12+":30 PM";
			}		
		}
		if(input.valueHigh==0 ||  input.valueHigh==24)
		{
			end="12:00 AM";
		}
		else if(input.valueHigh<=11.5)
		{
			if(input.valueHigh % 1 === 0)
			{
				end=input.valueHigh+":00 AM";	
			}
			else
			{
				end=Math.floor(input.valueHigh)+":30 AM";
			}	
		}
		else if(input.valueHigh==12)
		{
			end="12:00 PM";
		}
		else if(input.valueHigh==12.50)
		{
			end="12:30 PM";
		}
		else
		{
			if(input.valueHigh % 1 === 0)
			{
				end=input.valueHigh-12+":00 PM";
			}
			else
			{
				end=Math.floor(input.valueHigh)-12+":30 PM";
			}
		}
		document.getElementById("start").innerHTML= start ;
		document.getElementById("end").innerHTML= end;
	}

	input.addEventListener("input", update);
	ghost.addEventListener("input", update);

	update();
	
}

multirange.init = function() {
	Array.from(document.querySelectorAll("input[type=range][multiple]:not(.multirange)")).forEach(multirange);
}

if (document.readyState == "loading") {
	document.addEventListener("DOMContentLoaded", multirange.init);
}
else {
	multirange.init();
}

})();
