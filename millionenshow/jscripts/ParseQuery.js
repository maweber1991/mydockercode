function PageQuery(qry){
 
	this.ParamValues = {};
	this.ParamNo = 0;
 
	var CurrentQuery, AnchorValue = "";
 
	//if no querystring passed to constructor default to current location
	if(qry && qry.length>0){
		CurrentQuery = qry;
	}else{
		if(location.search.length>0){
			CurrentQuery = location.href;
		}else{
			CurrentQuery = "";
		}
	}
  
	//may want to parse a query that is not the current window.location
	this.ParseQuery = function(qry){  
		var rex = /[?&]([^=]+)(?:=([^&#]*))?/g;
		var rexa = /(\#.*$)/;
		var qmatch, key, amatch, cnt=0;

		//parse querystring storing key/values in the ParamValues associative array
		while(qmatch = rex.exec(qry)){
			key = denc(qmatch[1]);//get decoded key
			val = denc(qmatch[2]);//get decoded value

			if(this.ParamValues[key]){ //if we already have this key then update it if it has a value
				if(key&&key!="") this.ParamValues[key] = this.ParamValues[key] + ","+val;
			}else{
				this.ParamValues[key] = val;
				cnt++;
			}
		}
		//as no length property with associative arrays
		this.ParamNo = cnt;

		//store anchor value if there is one
		amatch = rexa.exec( qry );
		if(amatch) AnchorValue = amatch[0].replace("#","");
	}

	//run function to parse querystring and store array of key/values and any anchor tag
	if(CurrentQuery.length){
		this.ParseQuery( CurrentQuery );
	}  
 
	this.GetValue = function(key){ if(!this.ParamValues[key]) return ""; return this.ParamValues[key]; }
	this.GetAnchor = AnchorValue;

	// Output a string for display purposes
	this.OutputParams = function(){
		var Params = "";
		if(this.ParamValues && this.ParamNo>0){
			for(var key in this.ParamValues){
				Params+= key + ": " +  this.ParamValues[key] + "\n";
			}
		}
		if(AnchorValue!="") Params+= "Anchor: " + AnchorValue + "\n";
		return Params;
	}
	
	this.GetParamsIntoArray = function() {
		var params = new Array();
		if(this.ParamValues && this.ParamNo>0){
			for(var key in this.ParamValues){
				params.push(this.ParamValues[key]);
			}
		}
		return params;
	}
}

//Functions for encoding/decoding URL used in object

//encode
function enc(val){
	if (typeof(encodeURIComponent)=="function"){
		return encodeURIComponent(val);
	}else{
		return escape(val);
	}
}
//decode
function denc(val){
	if (typeof(decodeURIComponent)=="function"){
		return decodeURIComponent(val);
	}else{
		return unescape(val);
	}
}