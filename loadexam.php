
<?php 

//include database
include('db.php');

$exam_array=array();

$temp_array= array();

$main_exam_array=array();


 // question and options
$que_fetch_que = "SELECT * FROM question";

if($result = mysqli_query($conn,$que_fetch_que))
{
   
    while($row = mysqli_fetch_assoc($result)){
       
        $q_id=$row['q_id'];

        //question_name
        $temp_array['q_id'] = $row['q_id'];

        //question_name
        $temp_array['q_name'] = $row['que_name'];
        //question_ans
        $temp_array['q_ans'] = $row['ans'];
        $temp_array['selected'] = "selected";
        $temp_array['o_selected'] = false;


        $opt_fetch_que = "SELECT q_id,option_name FROM options WHERE q_id = '$q_id'";
        $opt_result = mysqli_query($conn,$opt_fetch_que);
        
        $option_array=array();

        while( $opt_row = mysqli_fetch_assoc($opt_result)){
        
            array_push($option_array,$opt_row['option_name']);

        }

        $temp_array['options'] = $option_array;

        array_push($exam_array,$temp_array);
        $main_exam_array['exam_data']=$exam_array;

    }

}

$mcq_sett_que = "SELECT * FROM mcq_setting LIMIT 1";
$mcq_sett_result = mysqli_query($conn,$mcq_sett_que);
$mcq_row = mysqli_fetch_assoc($mcq_sett_result);


$main_exam_array['negative_mark'] = $mcq_row['negative_marking'];


echo json_encode($main_exam_array);



?>