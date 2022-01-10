<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <title>Document</title>
    <style>
        .div_question{
            margin:10px 60px 30px 60px;
        }
        #previews_button {
            display: none;
        }

        .result_style_common{

        }

        .a_size{
            font-weight:500;
            font-size:18px;
        }

        .c_success{
            background-color:#81c784;
            border-left:4px solid #388e3c;
            color:white;
           
        }

        .c_danger{
            background-color:#e57373;
            border-left:4px solid #d32f2f;
            color:white;
            
        }

        .c_total{
            background-color:#4791db;
            border-left:4px solid #115293;
            color:white;
           
        }

        .c_attempt{
            background-color:#ffb74d;
            border-left:4px solid #f57c00;
            color:white;
           
        }
        

        #result{
            display:none;
        }

        .btn{
            margin-right:10px;
        }


    </style>
</head>
<body onload="loadexam()">
    
    <div >
        Time : <span id="timer"></span>
    </div>
    <div class="container" id="exam" style="background-color:#eeebdd;">
        

        <div class="row text-center">
            <div class="col">
                <h2>Quiz Application</h2>
            </div>
        </div> 

        <div class="row mb-5">
            <div class="div_question">
            <div class="col-md-8">
                <h5 id="question_load"> 1. Where are you ? </h5>
            </div>

            <div class="col-md-8 ">

                <div id="options_load">
                    
                
                </div>
                
            </div>

            </div>


        </div> 

        <div class="row pb-4">
        <div class="col-md-6">
        </div>
            <div class="col-md-6 d-flex">
                <button class="btn btn-secondary btn-sm ml-2 " id="previews_button" onclick="load_previews_que()">Previews</button>
                <button class="btn btn-secondary btn-sm mr-2" id="next_button" onclick="load_next_que()">Next</button>
                <button class="btn btn-success btn-sm mr-2" id="next_button" onclick="exam_submit()">Submit</button>
            </div>
        </div>  

    </div>

    <div class="container" id="result">
        
        <h1 class="text-center p-3 mb-4">Your Score</h1>

        <div class="row d-flex justify-content-center">
            <div class="col-md-3">
                <div class="alert c_total a_size" >
                    <span id="total_question">  </span>
                </div>
            </div>

            <div class="col-md-3">
                
                <div class="alert c_attempt a_size" >
                    <span id="attempt">  </span>
                </div>
            </div>

            <div class="col-md-3">
              
                <div class="alert c_success a_size">
                   <span id="right_ans">  </span>
                </div>

            </div>

            <div class="col-md-3" >
                <div class="alert c_danger a_size">
                    <span id="wrong_ans"> </span>
                </div>
            </div>

        </div>

        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-6">
                <div class="alert c_total a_size" >
                    <span id="percentage">   </span>
                </div>
            </div>
        </div>
    </div>


</body>
</html>

<script>

var main_array;
var main_array_length;
var counter=0;

var negative_marking;

function loadexam(){
    
    fetch("http://localhost/Quiz/loadexam.php")
        .then(function(response) {
        return response.json();
        })
        .then(function(json) {
            let fetch = json;
            main_array=fetch.exam_data;
            main_array_length = main_array.length;

            console.log(main_array_length);
            negative_marking = Number(fetch.negative_mark);
            
            loadquestion(0);
        });
}


function load_next_que()
{
    counter = counter + 1;
    loadquestion(counter);
    console.log(main_array);
}


function load_previews_que()
{
    counter = counter - 1;
    loadquestion(counter);
   
}


function loadquestion(que)
{
    if(que != 0)
    {
        document.getElementById("previews_button").style.display="block";
    }else{
        document.getElementById("previews_button").style.display="none";

    }

    if(que == main_array_length-1)
    {
        document.getElementById("next_button").style.display="none";

    }else{

        document.getElementById("next_button").style.display="block";
    }

    let question_name = main_array[que].q_name;
    let question_id = main_array[que].q_id;
    var option ='';
    main_array[que].options.forEach((d, index) => {
        
        if(index === Number(main_array[que].selected))
        {
          
            option +=`<div class="form-check">
                        <input class="form-check-input" type="radio" name="${question_id}" id="flexRadioDefault1" onclick="select_option('${que}','${index}')" checked ">
                        <label class="form-check-label" for="flexRadioDefault1">
                            ${d}
                        </label>
                    </div>`;
        }else{
           
        option +=`<div class="form-check">
                        <input class="form-check-input" type="radio" name="${question_id}" id="flexRadioDefault1" onclick="select_option('${que}','${index}')"  ">
                        <label class="form-check-label" for="flexRadioDefault1">
                            ${d}
                        </label>
                    </div>`;
        }

    });

    document.getElementById("question_load").innerHTML = (que+1) +". "+question_name;
    document.getElementById("options_load").innerHTML = option;

}


function select_option(que,option_id)
{
    // conos
    main_array[que].selected = option_id;
    main_array[que].o_selected = Number(option_id)+1;
}

function exam_submit()
{
    let total_question = main_array_length;
    let attempt_question=0;
    let right_ans=0;
    let wrong_ans=0;

    main_array.forEach((data) => {

        //attempt questions
        if(data.selected != "selected")
        {
            attempt_question = attempt_question + 1;

            
            if(data.o_selected == Number(data.q_ans))
            {
                //right ans
                right_ans = right_ans + 1;

            }else{
                //wrong ans
                wrong_ans = wrong_ans + 1;
            }
        }

        

    });


    let negative_points = negative_marking * wrong_ans;

    

    let ans_score = right_ans - negative_points;

    

    let percentage= (ans_score/ main_array_length)*100;

    if(percentage < 0 ){
        percentage = 0;
    }

    document.getElementById("result").style.display = "block";
    document.getElementById("exam").style.display = "none";
    


    document.getElementById("total_question").innerHTML = `Total Ques : ${total_question}`;
    document.getElementById("right_ans").innerHTML = `Right Ans : ${right_ans}`;
    document.getElementById("wrong_ans").innerHTML = `Wrong Ans : ${wrong_ans}`;
    document.getElementById("attempt").innerHTML = `Attemp Ques : ${attempt_question}`;
    document.getElementById("percentage").innerHTML = `Your Percentage : ${percentage}%`;
    
  
}
</script>


<script type="text/javascript">
    var timeoutHandle;
    function countdown(minutes, seconds) {
        function tick() {
            var counter = document.getElementById("timer");
            counter.innerHTML =
                minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
            seconds--;
            if (seconds >= 0) {
                timeoutHandle = setTimeout(tick, 1000);
            } else {
                if (minutes >= 1) {
                    // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
                    setTimeout(function () {
                        countdown(minutes - 1, 59);
                    }, 1000);
                }else{
                    exam_submit()
                }
            }
        }
        tick();
    }

    countdown(0, 10);
</script>