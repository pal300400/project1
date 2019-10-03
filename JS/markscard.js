var total = 0; //global var
var jasus=0;
function doTotal() {
	//var cppS = document.frm.txtCpp.value; //returns string
	var cppS = document.getElementById("txtCpp").value;
	var javaS = document.getElementById("txtJava").value; //returns string
	var webS = document.getElementById("txtWeb").value; //returns string


	if(jasus==0)
		{
		//parseFloat() converts string to float
		//parseInt() converts string to integer
		total = parseFloat(cppS) + parseFloat(javaS) + parseFloat(webS);

		document.getElementById("txtTotal").value = total;
		document.getElementById("btnPer").disabled = false;
			
		}
	else
	{
		alert("Fill valid data plz.....");
		jasus=0;
	}
	

}

function doPer() {
	//var per=total*100/300;
	var totalS = document.getElementById("txtTotal").value;
	var per = parseFloat(totalS) * 100 / 300;
	document.getElementById("txtPer").value = per;

}

function doNew() {
	document.getElementById("txtCpp").value="";
	document.getElementById("txtJava").value="";
	document.getElementById("txtWeb").value="";
	

}

function doCheck(ref,refErr)
{
	if(ref.value.length==0)
		{	
			//alert("Khali hai!!!!");
			refErr.innerHTML="Fill Marks..";
			ref.style.backgroundColor = "red";
			jasus++;
		}
	else
		if(isNaN(ref.value)==true)
		{refErr.innerHTML="Fill numeric..";
		 ref.style.backgroundColor = "red";
		 			jasus++;

		}
	else
		if(ref.value>100)
		{
			refErr.innerHTML="<=100 plz";
			ref.style.backgroundColor = "red";
						jasus++;

		}

	else
	{
		refErr.innerHTML="okay..";
		ref.style.backgroundColor = "white";
			

	}
}

/*
function doCheckJava()
{
		var ref = document.getElementById("txtJava");
		var refErr=document.getElementById("errJava");
	if(ref.value.length==0)
		{	
			//alert("Khali hai!!!!");
			refErr.innerHTML="Fill Marks..";
		}
	else
		if(isNaN(ref.value)==true)
			refErr.innerHTML="Fill numeric..";
	else
		if(ref.value>100)
			refErr.innerHTML="<=100 plz";

	else
			refErr.innerHTML="okay..";
}*/