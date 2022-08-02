		

		
	//Mobile Number Validation
	function conchk(){
		var number=document.getElementById("txtCnumber").value;
		var digits= /^[0-9]+$/;
		if(number.length==10){
			if(number.match(digits))
				return true;
		}
		alert("Number Not Valid");
		return false;
	}
		
		
	//all fuctions <------------
	function fuctionRun(){
		if( conchk()==true){
			alert("Submit Successfully");}
		else
			{
			event.preventDefault();
			alert("Submite Faild");
			}
	}