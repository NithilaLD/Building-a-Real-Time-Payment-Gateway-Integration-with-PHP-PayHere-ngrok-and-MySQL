<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Gateway</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/png" href="logo.png">
    </head>
    <body class="home-page">
        <main class="home-shell">
            <section class="home-card">
                <div class="home-badge">Secure online payments</div><br>
                <h1>Payment Gateway</h1><br><br>
                <form action="checkout.php" method="POST" class="home-form">
                    <label>
                        <span>Customer Name</span>
                        <input type="text" name="name" placeholder="John Doe" autocomplete="name" required>
                    </label>
                    <label>
                        <span>Email Address</span>
                        <input type="email" name="email" placeholder="john@example.com" autocomplete="email" required>
                    </label>
                    <label>
                        <span>Phone Number</span>
                        <input type="text" name="phone" placeholder="0771234567" autocomplete="tel" required>
                    </label>
                    <label>
                        <span>Amount</span>
                        <input type="text" inputmode="decimal" name="amount" placeholder="1000.00" pattern="^\d+(\.\d{1,2})?$" autocomplete="off" required>
                    </label>
                    <button type="submit">Pay Now</button>
                </form>
            </section>
        </main>
    </body>
</html>