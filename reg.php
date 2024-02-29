<!DOCTYPE html>

<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--<title> Registration or Sign Up form in HTML CSS | CodingLab </title>-->
        <link rel="stylesheet" href="reg.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
            <h2>Registration</h2>
            <form action="regidata.php" method="POST">
                <div class="input-box">
                    <input type="text" placeholder="Enter your name" name="name" required />
                </div>
                <div class="input-box">
                    <input
                        type="text"
                        placeholder="Enter your email"
						name="email"
                        required
                    />
                </div>
                <div class="input-box">
                    <input
                        type="password"
                        placeholder="Create password"
						name="pass"
                        required
                    />
                </div>
                <div class="input-box">
                    <input
                        type="phone"
                        placeholder="Phone Number"
						name="phone"
                        required
                    />
                </div>
                <div class="input-box">
                    <input
                        type="address"
                        placeholder="Address"
						name="address"
                        required
                    />
                </div>
                <div class="policy">
                    <input type="checkbox" />
                    <h3>I accept all terms & condition</h3>
                </div>
                <div class="input-box button">
                    <input type="Submit" name="submit" value="Register Now" />
                </div>

            </form>
        </div>
    </body>
</html>
