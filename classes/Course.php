<?php
class Course {
    
    public $code ;
    public $name ;
    public $creadit_hours ;
    public $seats_no ;
    public $professor_id ;
    public $tuition ;

    function __construct($name , $creadit_hours,$seats_no,$professor_id,$tuition)
    {
        $this->name = $name;
        $this->creadit_hours =$creadit_hours;
        $this->seats_no =$seats_no;
        $this->professor_id =$professor_id;
        $this->tuition =$tuition;
    }

    static function get_registered_students($code){
        require_once("config.php");
        $cn =mysqli_connect(DB_HOST,DB_USER_NAME,DB_USER_PW,DB_NAME);
        $rslt = mysqli_query($cn  ,"select c.* , s.name ,s.email  from course_students c join users s on (c.student_id=s.id)  where course_code=$code") ;
        $data =mysqli_fetch_all($rslt ,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }


}