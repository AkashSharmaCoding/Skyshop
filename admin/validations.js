function abc()
{

var name=		document.fbform.nn.value;
var feedback=	document.fbform.fback.value;


	if(name=="")
	{
		document.getElementById("nn1").style.background="red";
		document.form2.nn.focus();
		return false;
	}
	else if(feedback=="")
	{
		document.getElementById("fback1").style.background="red";
		document.form2.nn.focus();
		return false;
	}
	else
	{
		
	}
}
function normal()
{
	document.getElementById("nn1").style.backgroundColor="white";
	document.getElementById("fback1").style.backgroundColor="white";
}