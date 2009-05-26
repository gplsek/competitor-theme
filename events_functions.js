function register() {
	
	var activityID = document.getElementById('activityID').value;	
	var newCourseID = -1;
	
		for (i=0;i<document.getElementsByName('courseID').length;i++) {
		
			if (document.getElementsByName('courseID')[i].checked) {
			
				var newCourseID = document.getElementsByName('courseID')[i].value; 
			}
		}
	
	if (newCourseID == -1) {
			alert ("Please choose the race you would like to register for");
			return false;
		}
		
	else if(!document.getElementById('termagree').checked) {	
		alert("You need to agree with the waiver above to proceed.");
		return false;
	}	
		
	else {

	
	webaddress = 'http://online.activecommunities.com/elite/MyBasket/MyBasket.asp?Type=1&AddCourse=' + activityID + '~' + newCourseID + '~0~0~0~0~0';
	
    // alert ("Web Address = " + webaddress + "");
	
	newWindow = window.open(webaddress,'win','height=500,width=750,toolbar=yes,location=yes,status=yes,scrollbars=yes,resizable=yes');	
	newWindow.focus();

	}

}

function registerTeam() {
	
	var activityID = document.getElementById('activityID').value;	
	var newCourseID = -1;
	var newWindow;
	
		for (i=0;i<document.getElementsByName('courseID').length;i++) {
		
			if (document.getElementsByName('courseID')[i].checked) {
			
				var newCourseID = document.getElementsByName('courseID')[i].value; 
			}
		}
	
	if (newCourseID == -1) {
			alert ("Please choose the category of your team/group");
			return false;
		}	
		
	else {

	
	webaddress = 'https://online.activecommunities.com/elite/MyAccount/MyAccountCreateNewTeam.asp?activityID=' + activityID + '&courseID=' + newCourseID + '';
	
    // alert ("Web Address = " + webaddress + "");
	
	newWindow = window.open(webaddress,'win','height=500,width=750,toolbar=yes,location=yes,status=yes,scrollbars=yes,resizable=yes');	
	newWindow.focus();

	}

}

function termscond(){
	if(document.getElementById('termagree').checked) {	
		register();
		}
		else {
			alert("You need to agree with the waiver above to proceed.");
			return false;
		}
							   	
}

function show_answer(id){
	for (i=0;i<anz;i++){
		if (i==id){
			
			if (document.getElementById("answer_"+id).style.display=="block"){
				//alert(document.getElementById("faq_arrow_"+id).src);
				//document.getElementById("faq_arrow_"+id).src="img/faq_arrow_up.jpg";
				//alert(document.getElementById("faq_arrow_"+id).src);
				document.getElementById("answer_"+id).style.display="none";
				//document.getElementById("question_cnt_"+id).style.backgroundImage="url('img/spacer.gif')";
			}
			else{
				//document.getElementById("faq_arrow_"+id).src;
				//document.getElementById("faq_arrow_"+id).src="img/faq_arrow_down.jpg";
				document.getElementById("answer_"+id).style.display="block";
				//document.getElementById("question_cnt_"+id).style.backgroundImage="url('img/faq_question_bg_down.jpg')";
				//document.getElementById("question_cnt_"+id).style.backgroundRepeat="no-repeat";	
				//document.getElementById("answer_"+id).style.backgroundImage="url('img/faq_answer_bg_down.jpg')";	
				//document.getElementById("answer_"+id).style.backgroundRepeat="repeat-y";			
			}
		}
		else {
			//document.getElementById("faq_arrow_"+i).src="img/faq_arrow_up.jpg";
			document.getElementById("answer_"+i).style.display="none";
			//document.getElementById("question_cnt_"+i).style.backgroundImage="url('img/spacer.gif')";	
		}
	}
}