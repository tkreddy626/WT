<html>

<head>
    <title>Form validation</title>


    <style>
        .main {
            border: 2px solid black;
            width: 60%;
            padding: 5px;
        }

        .error {
            color: red;
        }
    </style>

</head>

<body background="b3.jpg">
    <?php
    $fname = $lname = $email = $phone = $gender = "";
    $fn_error = $ln_error = $em_error = $ph_error = $gn_error = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (empty($_POST['fname'])) {
            $fn_error = "First name is required";
        } else {
            $fname = test_in($_POST['fname']);
            if (!preg_match("/^[a-zA-Z]+$/", $fname)) {
                $fn_error = "enter valid First name";
            }
        }
        if (empty($_POST['lname'])) {
            $ln_error = "Last name is required";
        } else {
            $lname = test_in($_POST['lname']);
            if (!preg_match("/^[a-zA-Z]+$/", $lname)) {
                $ln_error = "enter valid Last name";
            }

        }
        if (empty($_POST['email'])) {
            $em_error = "Email is required";
        } else {
            $email = test_in($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $em_error = "enter valid Email";
            }
        }
        if (empty($_POST['phone'])) {
            $ph_error = "Mobile number is required";
        } else {
            $phone = test_in($_POST['phone']);
            if (!preg_match("/^[6-9]\d{9}+$/", $phone)) {
                $ph_error = "enter valid Phone number";
            }
        }
        if (empty($_POST['gender'])) {
            $gn_error = "Gender is required";
        } else {
            $gender = test_in($_POST['gender']);
        }
    }
    function test_in($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <!-- <div class="main"> -->
    <center>
        <h1>Form validation</h1>
        <section>
            <table cellpadding="5px 10px">
                <!-- The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script. -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <tr>
                        <td>
                            <label for="fname">First Name:<span class="error">*
                                    <?php echo $fn_error; ?>
                                </span></label>
                        </td>
                        <td>
                            <input type="text" name="fname" id="fname">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lname">Last Name:<span class="error">*
                                    <?php echo $ln_error; ?>
                                </span></label>
                        </td>
                        <td>
                            <input type="text" name="lname" id="lname">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email:<span class="error">*
                                    <?php echo $em_error; ?>
                                </span></label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phone">Mobile Number:<span class="error">*
                                    <?php echo $ph_error; ?>
                                </span></label>
                        </td>
                        <td>
                            <input type="text" name="phone" id="phone">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gender">Gender:<span class="error">*
                                    <?php echo $gn_error; ?>
                                </span></label>
                        </td>
                        <td>
                            <input type="radio" name="gender" id="gender" value="male">male
                            <input type="radio" name="gender" id="gender" value="female">female
                            <input type="radio" name="gender" id="gender" value="other">other
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox">Remember me
                        </td>
                    </tr>
                    <tr style="text-align: center;">

                        <td colspan="2"><input style="margin-right: 20px;" type="submit" name="submit"> <input
                                type="reset" nname="reset"></td>
                    </tr>
                </form>
            </table>
        </section>
        <!-- </div> -->
</body>

</html>
<?php
echo "<h2>Your Input:</h2>";
echo "your first name :" . $fname;
echo "<br>";
echo "your last name :" . $lname;
echo "<br>";
echo "your email:" . $email;
echo "<br>";
echo "your mobile number:" . $phone;
echo "<br>";
echo "you are:" . $gender;
?>