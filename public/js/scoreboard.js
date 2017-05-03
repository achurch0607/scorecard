//shows elements when a course is selected
function showDiv(elem){
   if(elem.value)
        document.getElementById('scoreboard').style.display = "block";
        document.getElementById('scoreButtons').style.display = "block";
//        document.getElementById('topRow').style.display = "block";
        document.getElementById('total').style.display = "block";
    }   
    
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

//update the total score if finish round is set it will insert score to database
function updateScore(){  

    var tot= 0;
    var arr = document.getElementsByName('score[]');
    var score = new Array(); 
    var notes = new Array();
    var score = $("input[name='score[]']").map(function(){return $(this).val();}).get()
    var par = 0;
    var birdie = 0;
    var ace = 0;
    var bogey = 0;
    var double = 0;
    var count = 0; 
    
    
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value)){
            tot += parseInt(arr[i].value);
        }
    }
    var totalHTML;
    var t  = (tot-60);
    if (t > 0){
       totalHTML = '+'+t; 
    }else if(t == 0){
        totalHTML = 'E';
    }else{
        totalHTML = t;
    } 
    document.getElementById('total').innerHTML=  totalHTML;  

    while(score.length > count){
        console.log(score[count]);
        if(score[count] == 1){
            ace += 1;
        }else if(score[count] == 2){
            birdie += 1;
        }else if(score[count] == 3){
            par += 1;
        }else if(score[count] == 4){
            bogey += 1;
        }else if(score[count] > 4){
            double +=1;
        }
        count++;
    }
    
var scoreNames = {ace:ace,birdie:birdie,par:par,bogey:bogey,double:double};
updateScoreCount(scoreNames);

//    return;
    var notes = $("input[name='notes[]']").map(function(){return $(this).val();}).get()
    var finish = $("input[name='finishRound'").prop('checked');
    var course = document.getElementById('course').value;
    if(finish){
    $.ajax({
        url: 'scoreboard',
        type: "post",
        data: {'score':score,'notes':notes, 'finish':finish, 'course':course, '_token': $('input[name=_token]').val()},
        success: function(data){
//          console.log(data);
          alert('Your round has been saved!')
        }
    }); 
}
}; 
  
  function getLastRound() {
    
    var course = document.getElementById('course').value;  
    
    $.ajax({
      url: 'lastround',
      type: "post",
      data: {'course':course, '_token': $('input[name=_token]').val()},
      success: function(data){
        console.log(data);
//     
        showLastRound(data);
      }
    });   
  };

function showLastRound(data){
    var score = ((data.lastRound[0]['score'][0] + 'score').split(","));   
}

function scoreColors(input, value){
     $(input).removeClass();

     if (value == 1){
         $(input).addClass('ace');
     }
     else if (value == 2){
         $(input).addClass('birdie');
     }
     else if(value == 4 ){
         $(input).addClass('bogey');
     }
     else if(value >=5){
         $(input).addClass('double');
     }


 }
function updateScoreCount(scoreNames){
    var ace = document.getElementById('ace');
    
    ace.innerHTML= scoreNames.ace;
    document.getElementById('birdies').innerHTML= scoreNames.birdie;
    
    document.getElementById('pars').innerHTML= scoreNames.par;
    
    document.getElementById('bogey').innerHTML= scoreNames.bogey;
    
    document.getElementById('double').innerHTML= scoreNames.double;
//    $('#double').css('display', 'inline-block');
}