<script>
function validateName(x){
      // Validation rule
      var re = /[A-Za-z -']$/;
      // Check input
      if(re.test(document.getElementById(x).value)){
        // Style green
        document.getElementById(x).style.borderColor ='black';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        //enable submit
        document.getElementById('done').disabled =false;
        return true;
      }else{
        //disable submit
        document.getElementById('done').disabled =true;
        // Style red
        document.getElementById(x).style.borderColor ='red';
        // Show error prompt
        document.getElementById(x + 'Error').style.display = "block";
        return false; 
      }
    }

function validateNameNumber(x){
      // Validation rule
      var re = /^[a-z0-9\-\s]+$/i;
      // Check input
      if(re.test(document.getElementById(x).value)){
        // Style green
        document.getElementById(x).style.borderColor ='black';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        //enable submit
        document.getElementById('done').disabled =false;
        return true;
      }else{
        //document.getElementById('done').disabled =true;
        // Style red
        document.getElementById(x).style.borderColor ='red';
        // Show error prompt
        document.getElementById(x + 'Error').style.display = "block";
        return false; 
      }
    }

function validateZip (x){
      // Validation rule
      var re = /^[0-9]{5}$/;
      // Check input
      if(re.test(document.getElementById(x).value)){
        // Style green
        document.getElementById(x).style.borderColor ='black';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        //enable submit
        document.getElementById('done').disabled =false;
        return true;
      }else{
        //diable submit
        document.getElementById('done').disabled =true;
        // Style red
        document.getElementById(x).style.borderColor ='red';
        // Show error prompt
        document.getElementById(x + 'Error').style.display = "block";
        return false; 
      }
    }

function validateCCN (x){
  if(document.getElementById('showCard').value == 3){
            var re = /^[0-9]{15}$/;
          } else{
            var re = /^[0-9]{16}$/;
          }

              if(re.test(document.getElementById(x).value)){
                  // Style green
                  document.getElementById(x).style.borderColor ='black';
                  // Hide error prompt
                  document.getElementById(x + 'Error').style.display = "none";
                  //enable submit
                  document.getElementById('done').disabled =false;
                  return true;
                }else{
                  //disable submit
                  document.getElementById('done').disabled =true;
                  // Style red
                  document.getElementById(x).style.borderColor ='red';
                  // Show error prompt
                  document.getElementById(x + 'Error').style.display = "block";
                  return false; 
                }
    }

function validateCCV (x){
  if(document.getElementById('showCard').value == 3){
            var re = /^[0-9]{4}$/;
          } else{
            var re = /^[0-9]{3}$/;
          }

              if(re.test(document.getElementById(x).value)){
                  // Style green
                  document.getElementById(x).style.borderColor ='black';
                  // Hide error prompt
                  document.getElementById(x + 'Error').style.display = "none";
                  //enable submit
                  document.getElementById('done').disabled =false;
                  return true;
                }else{
                  //disable submit
                  document.getElementById('done').disabled =true;
                  // Style red
                  document.getElementById(x).style.borderColor ='red';
                  // Show error prompt
                  document.getElementById(x + 'Error').style.display = "block";
                  return false; 
                }
    }    
</script>