
var SignupRegion = {
    rootNode:'',
    provinceNode:'',
    cityNode:'',
    regionNode:'',
    finallyId:'',
    objectName:'',
    selectProvince:function (){
        var selecRoot = document.getElementById(this.rootNode);
	var isSelectProvince = document.getElementById(this.provinceNode);
	var isSelectCity = document.getElementById(this.cityNode);
	var isSelectRegion = document.getElementById(this.regionNode);
	if(isSelectCity !== null){
            var removed = selecRoot.removeChild(isSelectCity);
        }	
	if(isSelectRegion !== null){
            var removed = selecRoot.removeChild(isSelectRegion);
        }
	if(parseInt(isSelectProvince.value) === 320000){
                isSelectProvince.setAttribute("style", "width: auto;");//点击后改变宽度
		this.selectCity();
	}
    },
//选择市
    selectCity:function(){
	var addOPtionNode = document.createElement('select');
	addOPtionNode.id = this.cityNode;
        addOPtionNode.setAttribute("class","form-control");
	addOPtionNode.setAttribute("onchange", "javascript:"+this.objectName+".selectRegion()");
        addOPtionNode.setAttribute("style", "width: auto;");
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
	var selectVal = document.getElementById(this.rootNode);
	selectVal.appendChild(addOPtionNode);
        this.selectRegion();
    },

//选择区
    selectRegion:function(){
	var selecRoot = document.getElementById(this.rootNode);
	var isSelectRegion = document.getElementById(this.regionNode);
	if(isSelectRegion !== null){
		selecRoot.removeChild(isSelectRegion);
	}
	var cityNodeVal = parseInt(document.getElementById(this.cityNode).value);
	//区值小于市的值加100
	var addOPtionNode = document.createElement('select');
	addOPtionNode.id = this.regionNode;
        //addOPtionNode.name = 'AdminSignupForm[region_id]';
        addOPtionNode.name = this.finallyId;
        addOPtionNode.setAttribute("class","form-control");
        addOPtionNode.setAttribute("style", "width: auto;");
        //addOPtionNode.setAttribute("name","AdminSignupForm[region_id]");
        addOPtionNode.setAttribute("name",this.finallyId);
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
		var selectVal = document.getElementById(this.rootNode);
		selectVal.appendChild(addOPtionNode);
		
}
};

