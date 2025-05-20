<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajax php Form</title>
</head>
<body>
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

    <div id="result"></div>

    <script>
      document.getElementById("bmiCalculator").addEventListener("submit", function(e) {
    e.preventDefault(); // Prevent normal form submission

    const formData = new FormData(this);

    fetch("submit.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const resultDiv = document.getElementById("result");
        if (data.success) {
            resultDiv.innerHTML = `<p><strong>${data.message}</strong></p>`;
        } else {
            resultDiv.innerHTML = `<p style="color:red;"><strong>Error:</strong> ${data.message}</p>`;
        }
    })
    .catch(error => {
        console.error("Error:", error);
        document.getElementById("result").innerHTML = `<p style="color:red;"><strong>An error occurred while processing your request.</strong></p>`;
    });
});

    </script>
</body>
</html>
