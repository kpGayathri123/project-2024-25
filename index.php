<html>
    <!-- index.php -->
    <head>
        <title> NutriMetric Index</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
       
    </head>
    <body> <!-- navigation bar start-->
        <div class="navbar" class="section">
            <a>
                <h2 class="logo">NutriMetric</h2>
            </a>
            <nav>
                <a class="pd28" href="#home">Home</a>
                <a class="pd28" href="#aboutUs">About Us</a>
                <a class="pd28" href="#utilities">Utilities</a>
            </nav>
            <a href="#contactsection" class="pd80">
                <button class="contactButton">
                    Contact Us
                </button>
            </a>
        </div>
        <!--navigation bar end-->


        <!--landing text-->
        <div id="home" class="landingpg" class="section">
        <br><br><br><br><br><br><br><br><br>
        <h1>Choose Health</h1>
        <h2 class="landingcap">Health Math Made Delicious!</h2>
        <a href="#utilities">
            <button class="buttonclick"> Calculate BMI Now!</button>
        </a><br><br><br><br>
    </div>
    <!--landing text end-->


    <!--about us div-->
            <div class="aboutUs" id="aboutUs" class="section"> 
                <h2>
                    About Us
                </h2>
                <p class="alignl">
                    We at NutriMetric aim to make healthy eating fun and soulful. We believe that better health starts with understanding one's body - and we do just that! 
                    With our easy-to-use BMI calculator, you can accurately check your body mass index and view our specialized diet plans for your weight range, along
                     with insightful content about healthy eating- motivating you to be your best self. Whether you're looking to gain weight, lose it, or simply eat
                      better, nutriMetric is here to support your journey with reliable information and practical guidance.
                </p>
            </div>
            <div> <img src="images/aboutUs.jpg" class="abtImg"></div>
        </div>
        <!--about us end-->


        <div class="utilitiesDiv" class="section" id="utilities">
            <!--utilities-->
            <div class="utilities"> 
                <h2>
                    Utilities
                </h2>
                <h3>
                    BMI Calculator
                </h3>
                <p class="alignl">
                    Body Mass Index (BMI) is a measure of body fat based on height and weight. BMI provides an estimation of whether an adult is underweight, overweight,
                     or of ideal weight. Weight outside of the ideal range may increase health risks. BMI does not provide information about body composition and 
                     therefore does not apply to pregnant women, children, some ethnic groups, or those with an athletic build. Age will also influence readings. 
                </p>
            </div>
            </div>

<div class="pagediv" id="bmiforms" >
  <!-- search form -->
  
    <div class="form-container">
      <h2 class="plain">BMI Results</h2>
      <form action="" method="post" id="bmiR">
        <div class="formdiv">
          <div>
            <label for="search-email">Email</label>
            <input type="email" name="email" id="search-email" placeholder="email" required>
          </div>
        </div>
        <div class="button-group">
          <button type="submit" name="search">Search</button>
          <button type="reset">Reset</button>
        </div>
      </form>
      <div id="dataContainer" class="plain"> </div>
    </div>
<!--search form end-->

  <!-- BMI calculatorn form -->
    <div class="form-container">
      <h2 class="plain">BMI Calculator</h2>
      <form action="" method="post" id="bmiC">
        <div class="formdiv">
          <div>
            Name <input type="text" name="name" placeholder="Name" id="name" required>
            Age <input type="number" name="age" placeholder="Age" id="age" step="1" required>
            Phone Number <input type="number" name="phone" placeholder="Phone Number" id="phone">
          </div>
          <div>
            Email <input type="email" name="email" placeholder="Email" required id="email">
            Height (in m) <input type="number" name="height" placeholder="Height (m)" required id="height" step="0.01">
            Weight (in kg) <input type="number" name="weight" placeholder="Weight (kg)" required id="weight" step="0.1"><br>
          </div>
        </div>
        <div class="button-group">
          <button type="submit" name="insert">Calculate</button>
          <button type="reset">Reset</button>
        </div>
      </form>
    <div class="alert" class=plain></div>
  </div>

</div>
<!--calculation form end-->


       <!--healthy reads div start-->
        <div class="container" >
            
            <div class="item1"><br><br>
                <h2> Healthy Reads</h2><br>
                <img src="images/reading1.jpg" class="rimg1"><br>
                <p><a href="https://www.medicalnewstoday.com/articles/322268" class="rA"><h3>What are the Benefits of Eating Healthy?</h3><br></a>
                Following a healthy diet has many benefits, including building <br>strong bones, protecting the heart, preventing disease,<br> 
                and boosting mood.</p>
            </div>
            <div class="plain"> space dedo thoda aur dedo</div>
            <div class="containerv">
                <br><br>
                <div class="container">
                    <br><br><br>
                    <div>
                        <img src="images/reading2.jpg" class="rimg2">
                    </div>
                    <div class="w300">
                        <p class="pdl10"><a href="https://www.mayoclinic.org/healthy-lifestyle/childrens-health/in-depth/nutrition-for-kids/art-20049335">

                        <h3>Importance of Healthy Nutrition in Children</h3></a>
                           
                            Children eating healthy grow up with lowered...
                        </p>
                    </div>
                </div>
                <div class="container">
                    <div>
                        <img src="images/reading3.jpg" class="rimg2">
                    </div>
                    <div class="w300">
                        <p class="pdl10"><a href="https://www.mayoclinic.org/healthy-lifestyle/fitness/in-depth/exercise/art-20045506">
                            <h3>Fitness and Clean Eating: How does your Diet affect your Gains?</h3></a>                           
                        Healthy eating helps you in all aspects of health...
                        </p>
                    </div>
                </div>
                <div class="container">
                    <div>
                        <img src="images/reading4.jpg" class="rimg2">
                    </div>
                    <div class="w300">
                        <p class="pdl10"><a href="https://www.healthline.com/nutrition/vegan-diet-benefits">
                            <h3>Benefits of Veganism: What Going Plant Based May Have in Store for You
                        </h3></a>
                        Veganism: Pros and Cons
                        </p>
                    </div>
                </div><br>
            </div>
         </div>
         <br><br><br>
<div class="contact-section" id="contactsection">    
    <br><br>
    <div>
       <h2> Send Us a Message!<h2>
        <h3">Contact Us</h3><br>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone">
                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
                +12 34567 89101<br><br>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail">
                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>
                contact@nutrimetric.com<br><br>
                              
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin">
                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
                 DHARMARAM COLLEGE, Hosur Main Road,<br> Bhavani Nagar, Post, Bengaluru,<br> Karnataka 560029
    </div>     
        <div class="form-container" style="margin-right:0;">
  <h2 class="plain">Contact Us</h2>
  <form action="" method="post" id="contact">
    <div class="formdiv">
      <div>
        Name <input type="text" name="name" placeholder="Name" id="name" required>
      </div>
      <div>
        Email <input type="email" name="email" placeholder="Email" required id="email">
      </div>
    </div>
    <div class="message-container">
      Message <br>
      <textarea id="message" name="message" rows="3" placeholder="Message"></textarea>
    </div>

    <div class="button-group">
      <button type="submit" name="insert">Submit</button>
      <button type="reset">Reset</button>
    </div>
  </form>
  <div class="alert plain"></div>
</div>
</div>
<br><br>
<!--footer start-->
     <div class="footerD">
     <footer>
         <div class="footerC"> 
            <div  class="item item1">NutriMetric helps you make smarter health choices with<br> tools
            like our BMI calculator and expert-backed content.<br> We simplify
             nutrition so you can focus on feeling your best.
                 <br><br>
                 <h2 class="footerL"> NutriMetric </h2>
            </div>
            <div class="item item2" class="footerNav">
                 <h3 class="plain">Quick Links</h3>
                <nav  class="footerNav">
                 <a  href="index.php">Home</a>
                 <a href="index.php#aboutUs">About Us</a>
                 <a  href="index.php#utilities">Utilities</a>
                </nav>
            </div>
            <div class="item item3">
                <h3 class="plain">Contact Us</h3><br>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-icon lucide-phone">
                <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"/></svg>
                +12 34567 89101<br><br>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail">
                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>
                contact@nutrimetric.com<br><br>
                              
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin">
                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
                 DHARMARAM COLLEGE, Hosur Main Road,<br> Bhavani Nagar, Post, Bengaluru,<br> Karnataka 560029
            </div>
                          
         </div>
     </footer>
 </div>  
 
 <!--footer end-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="bootstrap.bundle.min.js"></script>
 <script>
// 1. js for bmi calculation
  $(document).on('submit', '#bmiC', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "datasubmit.php",
        data: $(this).serialize(),
        dataType: "json",
        success: function(data){
            //on success, this is run
            let result = `<p class='bmiRes'>${data.msg}`;
            if (data.bmi && data.class) {
                result += `<br>Your BMI is <strong>${data.bmi}</strong>. Classification: <strong>${data.class}</strong>.</p>`;
            } else {
                result += `</p>`;
            }
            $('.alert').html(result);
        },
        error: function() {
            //this runn on error
            $('.alert').html("<p class='bmiRes'>Something went wrong. Please try again.</p>");
        }
    });
});

//2. js for bmi result retrieval
$(document).on('submit', '#bmiR', function(e){
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'datafetch.php',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(data){
            let output = '';
            if (data.bmi && data.class) {
                output = `<p class='bmiRes'>BMI: <strong>${data.bmi}</strong><br>Classification: <strong>${data.class}</strong></p>`;
            } else if (data.error) {
                output = `<p class='bmiRes'>${data.error}</p>`;
            }
            $('#dataContainer').html(output);
        },
        error: function(xhr, status, error){
            $('#dataContainer').html('<p class="bmiRes">Error fetching details.</p>');
            console.error("AJAX Error:", error);
        }
    });
});

//3. ajax for contact form
$(document).on('submit', '#contact', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "contactsubmit.php",
        data: $(this).serialize(),
        dataType: "json",
        success: function(){
            //on success, this is run
            $('.alert').html("<p class='bmiRes'>Your message was recorded successfully.</p>");
        },
        error: function() {
            //this runn on error
            $('.alert').html("<p class='bmiRes'>Something went wrong. Please try again.</p>");
        }
    });
});
</script>

    </body>
</html>