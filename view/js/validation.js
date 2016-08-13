function check_RegExp(id,valid,regexp,valstring)
{
	var	string=document.getElementById(id).value;
	if(!string.match(regexp))
	{
			document.getElementById(valid).innerHTML=valstring;
			return false;
	}
	else
	{
			document.getElementById(valid).innerHTML="";
			return true;
	}
}
function force_val(id,valid,forced_value)
{
	if(!check_null(id,valid)){
		document.getElementById(id).value=forced_value;
		return false;
	}
	return true;
}
function force_num_val(id,valid,forced_value)
{
	if(!check_numeric(id,valid))
	{
		document.getElementById(id).value=forced_value;
		return false;
	}
	return true;
}
function check_length(id,valid,limit){
	if(document.getElementById(id).value.length<limit){
		var str="This field must be at least "+limit+" characters";
		document.getElementById(valid).innerHTML=str;
		return false;
	}
	return true;
}
function createDate() 
{
	var montharr=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
	var Idate="<select id='date' onchange='check_date()' class='date'>";
	for(var i=1;i<=31;i++) 
	{
		Idate=Idate+"<option>"+i+"</option>";
	}
	Idate+="</select><select id='month' onchange='check_date()' class='month'>";
	for(var i=1;i<=12;i++) 
	{
		Idate+="<option value='"+i+"'>"+i+"</option>";	
	}
	Idate+="</select><select id='year' onchange='check_date()' class='year'>";
	for(var i=2007;i>=1900;i--) 
	{
		Idate+="<option value='"+i+"'>"+i+"</option>";
	}
	Idate+="</select>";
	document.getElementById("Adate").innerHTML=Idate;
}

function check_null( id , valid ) 
{
	var value_=document.getElementById(id).value;
	if(value_=="" || value_==null) 
	{
		document.getElementById(valid).innerHTML="This field can't be left blank";
		return false;		
	}
	else 
	{
		document.getElementById(valid).innerHTML="";		
		return true;
	}
}

function check_numeric(id,valid) 
{
	var is_null=check_null(id,valid);
	if(is_null==true) 
	{
		var value_=document.getElementById(id).value;
		if( isNaN(value_) ) 
		{
			document.getElementById(valid).innerHTML="The Field must contain numbers only";
			return false;
		}
		else 
		{
			document.getElementById(valid).innerHTML="";	
			return true;
		}
	}
}	
function check_date() 
{
	var str="";
	var d=document.getElementById("date").value;
	var m=document.getElementById("month").value;
	var y=document.getElementById("year").value;
	if(y%4==0 && m==2 && d>29) 
	{
		str+="February may be of only 29 days for "+y;
	}
	else if(m==2 && d>28) 
	{
		str+="February may be of only 28 days for "+y;
	}
	else if((m==4 || m==6 || m==9 || m==11) && d>30) 
	{
		str+="The month"+" don't have "+d+" date";
	}
	if(str!="") 
	{
		document.getElementById("val_date").innerHTML=str+"";
		return false;
	}
	else 
	{
		document.getElementById("val_date").innerHTML="";
		return true;
	}
}
function check_select(id,valid,chk_value) 
{
	var o=document.getElementById(id).value;
	if(o==(chk_value))
	{
		document.getElementById(valid).innerHTML="Please select valid option";
		return false;
	}
	else 
	{
		document.getElementById(valid).innerHTML="";
		return true;
	}
}
function compare(firstid,secondid,valid,msg) 
{	
	if(check_null(secondid,valid)) 
	{
		var f=document.getElementById(firstid).value;
		var s=document.getElementById(secondid).value;
		if(s!=f) 
		{
			document.getElementById(valid).innerHTML=msg;
		}
		else 
		{
			document.getElementById(valid).innerHTML="";
			return true;
		}
	}
	return false;
}
function strength(pass,valpass) 
{
	var i,val=0;
	var sth=document.getElementById(pass).value;
	if(sth.length>6)
	{
		val=8;
	}	
	else if (sth.length>=14) 
	{
		val=10;
	}
     	
	for (i=0;i<sth.length;i++) 
	{
		if(isNaN(sth.charAt(i)))
		{
			if(sth.charAt(i)<'a' || sth.charAt(i)>'z' ) 
			{
				if(sth.charAt(i)<'A' || sth.charAt(i)>'Z') 
				{
					val+=2;
				}
				else
				{
					val++;
				}
			}
			else
			{
				val++;
			}
		}
		else 
		{
			val+=2;
		}
	}
	if(val>=27) 
	{
		document.getElementById(valpass).innerHTML="<font color='green'>Password Strength: Very Strong</font>";
     	}
	else if(val>=22) 
	{
		document.getElementById(valpass).innerHTML="<font color='green'>Password Strength: Strong</font>"; 
	}
	else if(val>=19) 
	{
		document.getElementById(valpass).innerHTML="<font color='orange'>Password Strength: Good</font>"; 
	}
	else if(val>14) 
	{
		document.getElementById(valpass).innerHTML="<font color='pink'>Password Strength: Fine</font>"; 
	}
	else 
	{
		document.getElementById(valpass).innerHTML="Password Strength: Weak"; 
		return false;
	}
	return true;
}
function check_terms_conds() 
{
	if(document.getElementById("terms_conds").checked != true) 
	{
		document.getElementById("valterms_conds").innerHTML="You must accept the Terms and Conditions in order to Sign Up";
		return false;
	}
	else 
	{
		document.getElementById("valterms_conds").innerHTML="";
		return true;
	}
}
