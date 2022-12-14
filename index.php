
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Contact Us</title>
        <link rel="stylesheet" href="contact.css"/>
        <link rel="icon" type="image/x-icon" href="./logo.jpg">
    </head>
    <body>
        <!--- contact forum php code / get masseg to email address---->
    <?php 
      $errors = [];
      $errorMessage= '';
      if (!empty ($_POST)){
        $first_name =$_POST['first_name'];
        $last_name =$_POST['last_name'];
        $email =$_POST['email'];
        $phone =$_POST['phone'];
        $country =$_POST['country'];
        $subject =$_POST['subject'];

        if(empty($first_name)){
            $errors[] ='First name empty';
        }
        if(empty($last_name)){
            $errors[] ='Last name empty';
        }
        if(empty($email)){
            $errors[] = 'Empty email address';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] ='Email not valid';
        }
        if(empty($phone)){
            $errors[]="Phone number empty";
        }
        if (empty($country)){
            $errors[]='Country empty';
        }
        if(empty($subject)){
            $errors[]=" subject are empty";
        }
        if(empty($errors)){
            $toEmail = 'lthanushadimantha2000@gmail.com';
            $emailSubject ="New mail from contact form from FDG";
            $headers =['from'=> $email, 'Reply-To'=>$email, 'content-type'=> 'text/html; charset=utf-8'  ];
            $bodyParagraphs = [" First_Name: {$first_name}","Last_name:{$last_name}", "Email: {$email}", "Phone number:{$phone}","Country:{$country}","Message:", $subject];
            $body = join(PHP_EOL, $bodyParagraphs);

            if (mail($toEmail, $emailSubject, $body, $headers)) {
                header('Location: thank-you.html');
            }else{
                $errorMessage ="oops, something wen to wrong please try again........";
            }
        }else{
            $allErrors =join('<br/>', $errors);
            $errorMessage= "<p style='color:red;'>{$allErrors}<p/>";
        }
       
    }
    
      
    
    ?> 
 <!-- Hero banner for Contact Us page-->
        <div class="hero-image">
            <div class="hero-text">
                <h1> Wellcome to Contact Us page</h1>
                <p> If you have any problem or feedback please write us using this forum</p>
            </div>
        </div>

        <!-- Contact Us forum-->
        <div class="container">
            <form action="" method="post">
               <lable for ="fname"> First Name</lable>
               <input type="text" id="fname" name="first_name" placeholder="Enter your name">

               <lable for ="lname">Last Name</lable>
               <input type="text" id="lname" name="last_name" placeholder="Enter your last name">

               <lable for="email"> Enter your Email</lable>
               <input type="text" id="email" name="email" place holder ="Enter your Email Address">

               <lable for="phone">Enter Your Phone Number (Optional)</lable>
               <input type="text" id="phone" name="phone" placeholder="Enter Your Phone Number">

               <lable for ="country"> Country</lable>
               <input type="text" id="country" name="country" placeholder="Enter your country">

               <lable for="subject"> Subject</lable>
               <textarea id="subject" name="subject" placeholder="Enter your problem or Feedback" style="height:200px"></textarea>

               <input type="submit"  name="submit" class="form-btn">
            </forum>

        </div>
<!---- script file for form validation and get massege to email address----->

<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
 <script>


     const constraints = {
         first_name: {
             presence: { allowEmpty: false }
         },
         last_name:{
            presence: {allowEmpty: false}
         },
         email: {
             presence: { allowEmpty: false },
             email: true
         },
         phone:{
            presence:{allowEmpty: false}
         },
         country:{
            presence:{allowEmpty: false}
         },
         subject: {
             presence: { allowEmpty: false }
         }
     };

     const form = document.getElementById('contact-form');
     form.addEventListener('submit', function (event) {

         const formValues = {
             first_name: form.elements.first_name.value,
             last_name: form.elements.last_name.value,
             email: form.elements.email.value,
             phone: form.elements.phone.value,
             Country: form.elements.country.value,
             subject: form.elements.subject.value
         };


         const errors = validate(formValues, constraints);
         if (errors) {
             event.preventDefault();
             const errorMessage = Object
                 .values(errors)
                 .map(function (fieldValues) {
                     return fieldValues.join(', ')
                 })
                 .join("\n");

             alert(errorMessage);
         }
     }, false);
 </script>
    </body>
</html>
