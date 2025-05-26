<?php
include 'dbconnect.php';
//url putting
$weight_class = isset($_GET['class']) ? strtolower(trim($_GET['class'])) : '';

if (!$weight_class) {
    echo "<p>Please specify a valid weight class in the URL, e.g., ?class=underweight</p>";
    exit;
}
//allocate ids to classes
$class_to_id = [
    'underweight' => 1,
    'normal' => 2,
    'overweight' => 3,
    'obese' => 4
];

if (!isset($class_to_id[$weight_class])) {
    echo "<p>Invalid weight class specified.</p>";
    exit;
}

$plan_id = $class_to_id[$weight_class];

$sql = "SELECT description FROM diet_plans WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $plan_id, PDO::PARAM_INT);
$stmt->execute();
$plan = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$plan) {
    echo "<p>No diet plan found for '$weight_class'.</p>";
    exit;
}

$sql_items = "SELECT item_name, quantity, details FROM diet_items WHERE plan_id = :plan_id";
$stmt_items = $conn->prepare($sql_items);
$stmt_items->bindParam(':plan_id', $plan_id, PDO::PARAM_INT);
$stmt_items->execute();
$diet_items = $stmt_items->fetchAll(PDO::FETCH_ASSOC);
?>

<html>

<head>
   
    <title>Diet Plan for <?php echo htmlspecialchars(ucfirst($weight_class)); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="stylesheet.css" rel="stylesheet">
</head>
<body>

<!-- navigation bar start-->
        <div class="navbar_2" class="section">
            <a>
                <h2 class="logo">NutriMetric</h2>
            </a>
            <nav>
                <a class="pd28" href="index.php#home">Home</a>
                <a class="pd28" href="index.php#aboutUs">About Us</a>
                <a class="pd28" href="index.php#utilities">Utilities</a>
            </nav>
            <a href="index.php#contactsection" class="pd80">
                <button class="contactButton">
                    Contact Us
                </button>
            </a>
        </div>
<!--navigation bar end-->

<div class="plandisplay">
<div>
    <h2>Diet Plan: <?php echo htmlspecialchars(ucfirst($weight_class)); ?></h2>
    <div><?php echo htmlspecialchars($plan['description']); ?></div>
</div>
    <br>
<div>    
    <h3>Recommended Foods:</h3><br>
</div>
<br>
<div>    
    <?php if ($diet_items): ?>
        <ul class="list-group" id="text">
            <!--loop dietitems-->
        <?php foreach ($diet_items as $item): ?>
            <li class="list-group-item">
                <strong><?php echo htmlspecialchars($item['item_name']); ?></strong>
                <?php if ($item['quantity']): ?>
                    — <?php echo htmlspecialchars($item['quantity']); ?>
                <?php endif; ?>
                <br>
                <small><?php echo htmlspecialchars($item['details']); ?></small>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No diet items listed for this plan.</p>
    <?php endif; ?>
    </div>    
</div><br><br><br>

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
                 <h3 class="plain">Quick Links</h3><br>
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
</body>
</html>
