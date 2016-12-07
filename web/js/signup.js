
function SelectProvince(){
        var selecRoot = document.getElementById('adminsignupform-div');
	var isSelectProvince = document.getElementById('adminsignupform-province');
	var isSelectCity = document.getElementById('adminsignupform-city');
	var isSelectRegion = document.getElementById('adminsignupform-region_id');
	if(isSelectCity != null){
            var removed = selecRoot.removeChild(isSelectCity);
        }	
	if(isSelectRegion != null){
            var removed = selecRoot.removeChild(isSelectRegion);
        }
	if(parseInt(isSelectProvince.value) === 320000){
		SelectCity();
	}
}

//选择市
function SelectCity(){
	var addOPtionNode = document.createElement('select');
	addOPtionNode.id = 'adminsignupform-city';
        addOPtionNode.setAttribute("class","form-control");
	addOPtionNode.setAttribute("onchange", "javascript:SelectRegion()");
	var xmlOPtionValue = document.getElementsByTagName("region_id");
	var xmlOPtionText = document.getElementsByTagName("region_name");
	for(var i = 0; i < xmlOPtionValue.length; i++){
		//代表为市
		if(xmlOPtionValue[i].innerText % 100 === 0 && xmlOPtionValue[i].innerText != 320000){
			var add1option = document.createElement('option');
			var xmlOptionValue = xmlOPtionValue[i].innerText;
			var xmlOptionText = xmlOPtionText[i].innerText;
			add1option.setAttribute("value", xmlOptionValue);
			add1option.innerText =  xmlOptionText;
			addOPtionNode.appendChild(add1option);
		}

	}	
	var selectVal = document.getElementById('adminsignupform-div');
	selectVal.appendChild(addOPtionNode);
        SelectRegion();
}

//选择市
function SelectRegion(){
	var selecRoot = document.getElementById('adminsignupform-div');
	var isSelectRegion = document.getElementById('adminsignupform-region_id');
	if(isSelectRegion != null){
		selecRoot.removeChild(isSelectRegion);
	}
	var cityNodeVal = parseInt(document.getElementById('adminsignupform-city').value);
	//区值小于市的值加100
	var addOPtionNode = document.createElement('select');
	addOPtionNode.id = 'adminsignupform-region_id';
        addOPtionNode.name = 'AdminSignupForm[region_id]';
        addOPtionNode.setAttribute("class","form-control");
        addOPtionNode.setAttribute("name","AdminSignupForm[region_id]");
	var xmlOPtionValue = document.getElementsByTagName("region_id");
	var xmlOPtionText = document.getElementsByTagName("region_name");
	for(var i = 0; i < xmlOPtionValue.length; i++){
			//代表为区
			if((xmlOPtionValue[i].innerText < cityNodeVal+20) && xmlOPtionValue[i].innerText > cityNodeVal){
				var add1option = document.createElement('option');
				var xmlOptionValue = xmlOPtionValue[i].innerText;
				var xmlOptionText = xmlOPtionText[i].innerText;
				add1option.setAttribute("value", xmlOptionValue);
				add1option.innerText =  xmlOptionText;
				addOPtionNode.appendChild(add1option);
			}
		}
		var selectVal = document.getElementById('adminsignupform-div');
		selectVal.appendChild(addOPtionNode);
		
}
