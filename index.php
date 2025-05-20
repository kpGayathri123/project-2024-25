<html>
    <head>
        <title> NutriMetric Index</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body> <!-- navigation bar start-->
        <div class="navbar">
            <a>
                <h2 class="logo">NutriMetric</h2>
            </a>
            <nav>
                <a class="pd28" href="#home">Home</a>
                <a class="pd28" href="#aboutUs">About Us</a>
                <a class="pd28" href="#utilities">Utilities</a>
            </nav>
            <a href="contactUs.html" class="pd80">
                <button class="contactButton">
                    Contact Us
                </button>
            </a>
        </div>
        <!--navigation bar end-->
        <!--landing text-->
        <div id="home" class="landingpg">
        <br><br><br><br><br><br><br><br><br>
        <h1>Choose Health</h1>
        <h2 class="landingcap">Health Math Made Delicious!</h2>
        <a href="bmiform.html">
        <form>
            <input type="button" value="Calculate BMI Now!"  class="buttonclick">
        </form></a><br><br><br><br>
    </div>
    <!--about us div-->
            <div class="aboutUs" id="aboutUs"> 
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
        <div class="utilitiesDiv">
            <!--utilities-->
            <div class="utilities" id="utilities"> 
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
            <?php
ob_start();
session_start();
$conn = new mysqli("localhost", "root", "", "nutrimetric");

// BMI calculation logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["insert"]) && !empty($_POST["height"]) && !empty($_POST["weight"])) {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $age = intval($_POST["age"]);
        $height = floatval($_POST["height"]);
        $weight = floatval($_POST["weight"]);
        $phone = intval($_POST["phone"]);

        if ($height > 0) {
            $bmi = $weight / ($height * $height);
            $bmiRounded = round($bmi, 2);

            if ($bmi < 18.5) {
                $class = "Underweight";
            } elseif ($bmi < 25) {
                $class = "Normal";
            } else {
                $class = "Overweight";
            }

            $stmt = $conn->prepare("SELECT id FROM bmi_results WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->close();
                $stmt = $conn->prepare("UPDATE bmi_results SET name = ?, age = ?, phone = ?, height = ?, weight = ?, bmi = ?, class = ? WHERE email = ?");
                $stmt->bind_param("siidddss", $name, $age, $phone, $height, $weight, $bmiRounded, $class, $email);
                $stmt->execute();
            } else {
                $stmt->close();
                $stmt = $conn->prepare("INSERT INTO bmi_results (name, age, email, phone, height, weight, bmi, class) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sisiddds", $name, $age, $email, $phone, $height, $weight, $bmiRounded, $class);
                $stmt->execute();
            }
            $stmt->close();

            $_SESSION["bmi"] = $bmiRounded;
            $_SESSION["class"] = $class;
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit();
        }
    }

   //searching logic
    if (isset($_POST['search'])) {
        $_SESSION['search_email'] = $_POST['email'];
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>
<div class="pagediv">
  <!-- search form -->
  <div class="form-wrapper">
    <div class="form-container">
      <h2 class="plain">BMI Results</h2>
      <form action="" method="post" id="bmiResult">
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
    </div>

    <div>
        <!--search display-->
      <?php
      if (isset($_SESSION['search_email'])) {
          $email = $_SESSION['search_email'];
          $stmt = $conn->prepare("SELECT name, age, email, height, weight, bmi, class FROM bmi_results WHERE email = ?");
          $stmt->bind_param("s", $email);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
              echo "<table>
                      <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Height (m)</th>
                        <th>Weight (kg)</th>
                        <th>BMI</th>
                        <th>Class</th>
                      </tr>";
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>
                          <td>{$row['name']}</td>
                          <td>{$row['age']}</td>
                          <td>{$row['email']}</td>
                          <td>{$row['height']}</td>
                          <td>{$row['weight']}</td>
                          <td>{$row['bmi']}</td>
                          <td>{$row['class']}</td>
                        </tr>";
              }
              echo "</table>";
          } else {
              echo "<p class='bmiRes'>No record found. Calculate your BMI.</p>";
          }

          $stmt->close();
          unset($_SESSION['search_email']);
      }
      ?>
    </div>
  </div>

  <!-- BMI calculatorn form -->
  <div class="form-wrapper">
    <div class="form-container">
      <h2 class="plain">BMI Calculator</h2>
      <form action="" method="post" id="bmiCalculator">
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
    
  </div>

  <!-- BMI result-->
 <div>  
  <?php
  if (isset($_SESSION["bmi"]) && isset($_SESSION["class"])) {
      $bmi = $_SESSION["bmi"];
      $class = $_SESSION["class"];
      echo "<br><p class='bmiRes'>Your BMI is <strong>$bmi</strong>. Your weight is classified as <strong>$class</strong>.</p>";
      unset($_SESSION["bmi"]);
      unset($_SESSION["class"]);
  }
  ?>
  </div>
  </div>
</div>

<?php ob_end_flush(); ?>


       <!--healthy reads div start-->
        <div class="container">
            
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
<!--footer start-->
                <div class="footerD">
     <footer>
         <div class="footerC"> 
            <div  class="item item1"> <img src="images/footerLogo.png" class="footerLogo">
                 <br>
                 <h2 class="footerL"> NutriMetric </h2>
            </div>
            <div class="item item2" class="footerNav">
                 <h3 class="plain">Quick Links</h3>
                <nav  class="footerNav">
                 <a  href="index.html">Home</a>
                 <a href="index.html#aboutUs">About Us</a>
                 <a  href="index.html#utilities">Utilities</a>
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
                Ground Floor, Building, Street,<br>
                Layout, City, State, Country. Pin-123456
            </div>
                          
         </div>
     </footer>
 </div>  
    </body>
</html>