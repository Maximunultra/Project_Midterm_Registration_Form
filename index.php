<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body{
            
            margin-top: 50px;
            background-image: url("https://img.utdstc.com/screen/59f/607/59f6071d39eb32eb6335809cf503df4b9838172d8684339e5800380c14ec0440:600");
            height: 500px; /* You must set a specified height */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover;
          
        }
       
        form {
        
            display: grid;
            height: 500px;
            grid-template-columns: 1fr 1fr;
            grid-column-gap: 20px;
          
        
                
         }

    .rside {
        display: flex;
        flex-direction: column;
        align-items:  center;
        
        margin-left: 30px;
    }

    .lside {
        display: flex;
        flex-direction: column;
        align-items: center;
        
        margin-right: 40px;
    }


    div {
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }



   .b {
        margin-right: 50px;
        
    }


    
    input[type="text"],
    input[type="password"],
    input[type="number"],
    input[type="date"] {
    
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .btton{
        display: flex;
        gap: 10px;
    }


    button {
        width: 100px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        background: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background: #45a049;
    }

    </style>
</head>
<body>
    <center><h1>REGISTRATION FORM</h1></center>
    <form id="myForm">
        <div class="rside">
            <div>
                <label for="fname">Firstname</label>
                <input type="text" name="fname" id="fname" placeholder="Firstname">
            </div>
            <div>
                <label for="Mname">Middlename</label>
                <input type="text" name="Mname" id="Mname" placeholder="Middlename">
            </div>
            <div>
                <label for="lname">Lastname</label>
                <input type="text" name="lname" id="lname" placeholder="Lastname">
            </div>
            <div>
                <label for="gender">Gender</label>
                <input type="text" name="gender" id="gender" placeholder="Gender">
            </div>
            <div class="b">
                <label for="Birt">Birthdate</label>
                <input type="date" name="Birt" id="Birt" placeholder="Birthdate">
            </div>
            <div>
                <label for="Age">Age</label>
                <input type="number" name="Age" id="Age" placeholder="Age">
            </div>
        </div> 
        <div class="lside">
            <div>
                <label for="uname">Username</label>
                <input type="text" name="uname" id="uname" placeholder="Username">
            </div>
            <div>
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" placeholder="Email Address">
            </div>
            <div>
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">

            </div>
            <div>
                <input type="checkbox" onclick="checkbox()"> Show Password
            </div>
            <div>
                <label for="cpass">Confirm Password</label>
                <input type="password" name="cpass" id="cpass" placeholder="Confirm Password">
                <p id="message">  </p> <!--for checking passwrord and confirm_password-->
            </div>
            
            <div class="btton">
                <button onclick="checkPassword()" type="submit">Submit</button>
                <button  type="reset">Clear</button>
            </div>
        </div>
    </form>

    <script>
        // Showing Password
        function checkbox(){
            var p= document.getElementById("pass");
            var cp= document.getElementById("cpass");
            if(p.type === "password"){
                p.type="text";
            }else{
                p.type="password";
            }

            if(cp.type === "password"){
                cp.type="text";
            }else{
                cp.type="password";
            }


        }

        function checkPassword(){
            let password = document.getElementById("pass").value;
            let Conpassword = document.getElementById("cpass").value;
            console.log(password,Conpassword);

            let message = document.getElementById("message");

            
                if (password == Conpassword){
                    message.textContent = "Passwords Match";
                    message.style.background = "#3ae374";
                }else{
                    message.textContent = "Passwords don't Match";
                    message.style.background = "#ff4d4d";
                }
            

        }
    </script>

    <script>
    // Function to calculate age based on birthdate
    function calculateAge(birthdate) {
        const today = new Date();
        const dob = new Date(birthdate);
        let age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        
        return age;
    }
    
    // Get birthdate input element
    const birthdateInput = document.getElementById('Birt');
    // Get age input element
    const ageInput = document.getElementById('Age');
    
    // Add event listener to birthdate input
    birthdateInput.addEventListener('change', function() {
        // Calculate age based on birthdate value
        const age = calculateAge(this.value);
        // Update age input value
        ageInput.value = age;
    });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#myForm").submit(function(e){
                e.preventDefault();
                
                const fname = document.getElementById("fname").value;
                const Mname = document.getElementById("Mname").value;
                const lname = document.getElementById("lname").value;
                const gender = document.getElementById("gender").value;
                const Birt = document.getElementById("Birt").value;
                const Age = document.getElementById("Age").value;
                const uname = document.getElementById("uname").value;
                const email = document.getElementById("email").value;
                const pass = document.getElementById("pass").value;
                
                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: {
                        "fname": fname,
                        "Mname": Mname,
                        "lname" : lname,
                        "gender" : gender,
                        "Birt" :Birt,
                        "Age" : Age,
                        "uname" : uname,
                        "email": email,
                        "pass" : pass
                        
                    },
                    success: function(response) {
                        var data = JSON.stringify(response);
                        console.log(data)
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: ", error)
                    }
                });
            });
        });
    </script>

</body>
</html>