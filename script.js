function bmi() {
    event.preventDefault();  
    const weight=parseFloat(document.getElementById('weight').value);
    const height=parseFloat(document.getElementById('height').value);
    const bmi=weight/(height*height);
            
    let message=`Your BMI is: ${bmi.toFixed(2)}. `;
            
      if (bmi<18.5) {
            message +="You are underweight.";
      } else if (bmi<25) {
            message +="You are in the normal weight range.";
      } else {
            message +="You are overweight.";
      }
            
     document.getElementById('result').textContent = message;
}                