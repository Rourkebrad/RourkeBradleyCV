
//connect with google sheets contact sheet

function postToGoogle() {
	var field1 = $("#nameField").val();
	var field2 = $("#emailField").val();
	var field3 = $("#textField").val();
	

	$.ajax({
		url: "https://docs.google.com/forms/d/e/1FAIpQLSesHT26AZ9IVQH526NUl2JLHb3HejOeFlKsIJJO8CO5ECVzRA/formResponse?",
		data: {
			"entry.2097451255": field1,
			"entry.1504576955": field2,
			"entry.1845205565": field3
		},
		type: "POST",
        dataType: "xml",

        success: function (d) {
        },
        error: function (x, y, z) {

            $('#success-msg').show();
            $('#my_form').hide();
        }

	});
    return false;
    
    
}

function resetQuiz()
{
    //document.getElementById("my_form").reset();
    
   
}

//Knowledge quiz
function check() {
	var question1 = document.quizMusic.question1.value;
	var question2 = document.quizMusic.question2.value;
	var question3 = document.quizMusic.question3.value;
	var question4 = document.quizMusic.question4.value;
	var question5 = document.quizMusic.question5.value;
	var question6 = document.quizMusic.question6.value;
	var question7 = document.quizMusic.question7.value;
	var question8 = document.quizMusic.question8.value;
	var question9 = document.quizMusic.question9.value;
	var question10 = document.quizMusic.question10.value;

	var correctQuiz = 0;

	if (question1 == "3") {
		correctQuiz++;
	}
	if (question2 == "2") {
		correctQuiz++;
	}
	if (question3 == "1") {
		correctQuiz++;
	}
	if (question4 == "3") {
		correctQuiz++;
	}
	if (question5 == "1") {
		correctQuiz++;
	}
	if (question6 == "4") {
		correctQuiz++;
	}
	if (question7 == "4") {
		correctQuiz++;
	}
	if (question8 == "1") {
		correctQuiz++;
	}
	if (question9 == "2") {
		correctQuiz++;
	}
	if (question10 == "3") {
		correctQuiz++;
	}



	var messages = ["Well done", "Average", "Crap"];
	var pictures = ["img/success.gif", "img/average.gif", "img/crap.gif"];

	var range;

	if (correctQuiz < 5) {
		range = 2;
	}
	if (correctQuiz > 4 && correctQuiz < 7) {
		range = 1;
	}
	if (correctQuiz > 6) {
		range = 0;
	}

   


    document.getElementById("afterSubmit").style.visibility = "visible";
    document.getElementById("numberCorrect").innerHTML = "You got " + correctQuiz + " correct.";
	document.getElementById("message").innerHTML = messages[range];
	document.getElementById("picture").src = pictures[range];
    

	document.location.href = "#QuizAnswer";

}


//Bass or Guitar Quiz

function BOGcheck()
{
  var BOGquestion1 = document.bassOrGuitarQuiz.BOGquestion1.value;
  var BOGquestion2 = document.bassOrGuitarQuiz2.BOGquestion2.value;
  var BOGquestion3 = document.bassOrGuitarQuiz3.BOGquestion3.value;
  var BOGquestion4 = document.bassOrGuitarQuiz4.BOGquestion4.value;
  var BOGquestion5 = document.bassOrGuitarQuiz5.BOGquestion5.value;

    //answers for Bass or Guitar Quiz
    var answers = ["1","1","1","1","1"];
   

    var BOGcorrectQuiz = 0;

    if (BOGquestion1 == answers[0]) {
        BOGcorrectQuiz++;
    }
    if (BOGquestion2 == answers[1]) {
        BOGcorrectQuiz++;
    }
    if (BOGquestion3 == answers[2]) {
        BOGcorrectQuiz++;
    }
    if (BOGquestion4 == answers[3]) {
        BOGcorrectQuiz++;
    }
    if (BOGquestion5 == answers[4]) {
        BOGcorrectQuiz++;
    }

    var BOGmessages = ["We recommend that you buy a guitar for your first instrument.", "Buying a Bass is recommended for you"];
    var BOGpictures = ["img/guitar.gif", "img/bass.gif"];

    var BOGrange;

    if (BOGcorrectQuiz >= 3) {
        BOGrange = 0;
    }
    else
    {
        BOGrange = 1;
    }

    document.getElementById("BOGafterSubmit").style.visibility = "visible";
    document.getElementById("BOGmessage").innerHTML = BOGmessages[BOGrange];
    document.getElementById("BOGpictures").src = BOGpictures[BOGrange];

    document.location.href = "#BOGQuizAnswer";

   

    
}

//Type of Bass to buy quiz

function BGcheck()
{
    var BGquestion1 = document.buyerGuide.BGquestion1.value;
    var BGquestion2 = document.buyerGuide2.BGquestion2.value;
    var BGquestion3 = document.buyerGuide3.BGquestion3.value;
    var BGquestion4 = document.buyerGuide4.BGquestion4.value;
    var BGquestion5 = document.buyerGuide5.BGquestion5.value;
    var BGquestion6 = document.buyerGuide6.BGquestion6.value;
    var BGquestion7 = document.buyerGuide7.BGquestion7.value;
    var BGquestion8 = document.buyerGuide8.BGquestion8.value;
    var BGquestion9 = document.buyerGuide9.BGquestion9.value;
    var BGquestion10 = document.buyerGuide10.BGquestion10.value;
    

    //answers for Bass or Guitar Quiz
    var BGanswersA = ["1", "1", "1", "1", "1", "1", "1", "1", "1", "1"];
    var BGanswersB = ["2", "2", "2", "2", "2", "2", "2", "2", "2", "2"];
    var BGanswersC = ["3", "3", "3", "3", "3", "3", "3", "3", "3", "3"];
    var BGanswersD = ["4", "4", "4", "4", "4", "4", "4", "4", "4", "4"];


    var BGcorrectQuizA = 0; //StingRay
    var BGcorrectQuizB = 0; //Fender Precision
    var BGcorrectQuizC = 0; //Fender Jazz
    var BGcorrectQuizD = 0; //Rickenbacker

    //Question1
    if (BGquestion1 == BGanswersA[0]) {
        BGcorrectQuizA++;
    }
    if (BGquestion1 == BGanswersB[0]) {
        BGcorrectQuizB++;
    }
    if (BGquestion1 == BGanswersC[0]) {
        BGcorrectQuizC++;
    }
    if (BGquestion1 == BGanswersD[0]) {
        BGcorrectQuizD++;
    }

    //Question2
    if (BGquestion2 == BGanswersA[1]) {
        BGcorrectQuizA++;
    }
    if (BGquestion2 == BGanswersB[1]) {
        BGcorrectQuizB++;
    }
    if (BGquestion2 == BGanswersC[1]) {
        BGcorrectQuizC++;
    }
    if (BGquestion2 == BGanswersD[1]) {
        BGcorrectQuizD++;
    }


    //Question3

    if (BGquestion3 == BGanswersA[2]) {
        BGcorrectQuizA++;
    }
    if (BGquestion3 == BGanswersB[2]) {
        BGcorrectQuizB++;
    }
    if (BGquestion3 == BGanswersC[2]) {
        BGcorrectQuizC++;
    }
    if (BGquestion3 == BGanswersD[2]) {
        BGcorrectQuizD++;
    }

    //Question4

    if (BGquestion4 == BGanswersA[3]) {
        BGcorrectQuizA++;
    }
    if (BGquestion4 == BGanswersB[3]) {
        BGcorrectQuizB++;
    }
    if (BGquestion4 == BGanswersC[3]) {
        BGcorrectQuizC++;
    }
    if (BGquestion4 == BGanswersD[3]) {
        BGcorrectQuizD++;
    }

    //Question5


    if (BGquestion5 == BGanswersA[4]) {
        BGcorrectQuizA++;
    }
    if (BGquestion5 == BGanswersB[4]) {
        BGcorrectQuizB++;
    }
    if (BGquestion5 == BGanswersC[4]) {
        BGcorrectQuizC++;
    }
    if (BGquestion5 == BGanswersD[4]) {
        BGcorrectQuizD++;
    }

    //Question6
    
    if (BGquestion6 == BGanswersA[5]) {
        BGcorrectQuizA++;
    }
    if (BGquestion6 == BGanswersB[5]) {
        BGcorrectQuizB++;
    }
    if (BGquestion6 == BGanswersC[5]) {
        BGcorrectQuizC++;
    }
    if (BGquestion6 == BGanswersD[5]) {
        BGcorrectQuizD++;
    }

    //Question7

    if (BGquestion7 == BGanswersA[6]) {
        BGcorrectQuizA++;
    }
    if (BGquestion7 == BGanswersB[6]) {
        BGcorrectQuizB++;
    }
    if (BGquestion7 == BGanswersC[6]) {
        BGcorrectQuizC++;
    }
    if (BGquestion7 == BGanswersD[6]) {
        BGcorrectQuizD++;
    }

    //Question8

    if (BGquestion8 == BGanswersA[7]) {
        BGcorrectQuizA++;
    }
    if (BGquestion8 == BGanswersB[7]) {
        BGcorrectQuizB++;
    }
    if (BGquestion8 == BGanswersC[7]) {
        BGcorrectQuizC++;
    }
    if (BGquestion8 == BGanswersD[7]) {
        BGcorrectQuizD++;
    }

    //Question9

    if (BGquestion9 == BGanswersA[8]) {
        BGcorrectQuizA++;
    }
    if (BGquestion9 == BGanswersB[8]) {
        BGcorrectQuizB++;
    }
    if (BGquestion9 == BGanswersC[8]) {
        BGcorrectQuizC++;
    }
    if (BGquestion9 == BGanswersD[8]) {
        BGcorrectQuizD++;
    }

    //Question10

    if (BGquestion10 == BGanswersA[9]) {
        BGcorrectQuizA++;
    }
    if (BGquestion10 == BGanswersB[9]) {
        BGcorrectQuizB++;
    }
    if (BGquestion10 == BGanswersC[9]) {
        BGcorrectQuizC++;
    }
    if (BGquestion10 == BGanswersD[9]) {
        BGcorrectQuizD++;
    }

   

    var BGmessages = ["The bass recommended is a Sting Ray","The bass recommended is a Fender Precision. ", "The bass recommended is a Fender Jazz. ","The bass recommended is a Rickenbacker. ", "The bass recommended is Fender Squier"];
    var BGpictures = ["img/stingray.gif", "img/fenderp.gif", "img/fenderj.gif", "img/rickenbacker.gif", "img/squier.gif"];
    var BGrange;

    if (BGcorrectQuizA > 3)
    {
        BGrange = 0;
       
    }
    else if (BGcorrectQuizB > 3) {
        BGrange = 1;
        
    }
    else if (BGcorrectQuizC > 3) {
        BGrange = 2;
    }
    else if (BGcorrectQuizD > 3) {
        BGrange = 3;
    }
    else {
        BGrange = 4;
    }
    
    document.getElementById("BGafterSubmit").style.visibility = "visible";
    document.getElementById("BGmessage").innerHTML = BGmessages[BGrange];
    document.getElementById("BGpictures").src = BGpictures[BGrange];

    document.location.href = "#BGQuizAnswer";

    finalAnswer = document.getElementById("BGmessage").innerText;

    $.ajax({
        url: "https://docs.google.com/forms/d/e/1FAIpQLSfjdZfZlifz8SpJZyviS61ukZ9mq5BIm0BIRwPP-rQZj4ujFA/formResponse?",
        data: {
            "entry.1765057314": finalAnswer
        },
        type: "POST",
        dataType: "xml",

    });
    return false;



}

//Music Knowledge Quiz
function musicKanswers() {
    if ($('input[name=question1]:checked').length > 0 && $('input[name=question2]:checked').length > 0 && $('input[name=question3]:checked').length > 0 && $('input[name=question4]:checked').length > 0 && $('input[name=question5]:checked').length > 0 && $('input[name=question6]:checked').length > 0 && $('input[name=question7]:checked').length > 0 && $('input[name=question8]:checked').length > 0 && $('input[name=question9]:checked').length > 0 && $('input[name=question10]:checked').length > 0) {
        $.mobile.changePage("#QuizAnswer", { transition: "slide up" });
        check();
    }
    else
    {
        alert("Error - Please answer all questions");

    }
}



function answerRequired1() {

    //question1
    if ($('input[name=BOGquestion1]:checked').length > 0) {
        $.mobile.changePage("#BeginnerBOG2", { transition: "flip" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function answerRequired2() {

    //question2
    if ($('input[name=BOGquestion2]:checked').length > 0) {
        $.mobile.changePage("#BeginnerBOG3", { transition: "flip" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function answerRequired3() {
    //question3
    if ($('input[name=BOGquestion3]:checked').length > 0) {
        $.mobile.changePage("#BeginnerBOG4", { transition: "flip" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function answerRequired4() {
    //question4
    if ($('input[name=BOGquestion4]:checked').length > 0) {
        $.mobile.changePage("#BeginnerBOG5", { transition: "flip" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function answerRequired5() {
    //question5
    if ($('input[name=BOGquestion5]:checked').length > 0) {
        $.mobile.changePage("#BOGQuizAnswer", { transition: "flip" });
        BOGcheck();
    }
    else {
        alert("Error - Please select an answer");

    }
}


//Type of Bass Quiz


function BGanswerRequired1() {

    //question1
    if ($('input[name=BGquestion1]:checked').length > 0) {
        $.mobile.changePage("#quizStart2", { transition: "slide" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function BGanswerRequired2() {

    //question2
    if ($('input[name=BGquestion2]:checked').length > 0) {
        $.mobile.changePage("#quizStart3", { transition: "slide" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function BGanswerRequired3() {
    //question3
    if ($('input[name=BGquestion3]:checked').length > 0) {
        $.mobile.changePage("#quizStart4", { transition: "slide" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function BGanswerRequired4() {
    //question4
    if ($('input[name=BGquestion4]:checked').length > 0) {
        $.mobile.changePage("#quizStart5", { transition: "slide" });
    }
    else {
        alert("Error - Please select an answer");

    }
}


function BGanswerRequired5() {
    //question5
    if ($('input[name=BGquestion5]:checked').length > 0) {
        $.mobile.changePage("#quizStart6", { transition: "slide" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function BGanswerRequired6() {
    //question6
    if ($('input[name=BGquestion6]:checked').length > 0) {
        $.mobile.changePage("#quizStart7", { transition: "slide" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function BGanswerRequired7() {
    //question7
    if ($('input[name=BGquestion7]:checked').length > 0) {
        $.mobile.changePage("#quizStart8", { transition: "slide" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function BGanswerRequired8() {
    //question8
    if ($('input[name=BGquestion8]:checked').length > 0) {
        $.mobile.changePage("#quizStart9", { transition: "slide" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function BGanswerRequired9() {
    //question9
    if ($('input[name=BGquestion9]:checked').length > 0) {
        $.mobile.changePage("#quizStart10", { transition: "slide" });
    }
    else {
        alert("Error - Please select an answer");

    }
}

function BGanswerRequired10() {
    //question10
    if ($('input[name=BGquestion10]:checked').length > 0) {
        $.mobile.changePage("#BGQuizAnswer", { transition: "slide" });
        BGcheck();
    }
    else {
        alert("Error - Please select an answer");

    }
}

function ReloadBass() {
    
    location.href = '#bass';
    location.reload(true / false);

}



function ReloadMusician() {

	location.href = '#musician';
	location.reload(true / false);

}


function reloadPage() {
	
    document.getElementById("quizMusic").reset();
   
}

function BOGreloadPage()
{
    document.getElementById("bassOrGuitarQuiz").reset();
    document.getElementById("bassOrGuitarQuiz2").reset();
    document.getElementById("bassOrGuitarQuiz3").reset();
    document.getElementById("bassOrGuitarQuiz4").reset();
    document.getElementById("bassOrGuitarQuiz5").reset();
}

function BGreloadPage()
{
    document.getElementById("buyerGuide").reset();
    document.getElementById("buyerGuide2").reset();
    document.getElementById("buyerGuide3").reset();
    document.getElementById("buyerGuide4").reset();
    document.getElementById("buyerGuide5").reset();
    document.getElementById("buyerGuide6").reset();
    document.getElementById("buyerGuide7").reset();
    document.getElementById("buyerGuide8").reset();
    document.getElementById("buyerGuide9").reset();
    document.getElementById("buyerGuide10").reset();
}


function reloadContact()
{
    location.href = '#guide';
    location.reload();
}




