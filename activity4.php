<!DOCTYPE html>
<html lang="en">
<head>
    <title>Java Jam Coffee House</title>
    <meta name="description" content="CENG 311 Inclass Activity 1" />
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            width: 100%;
        }

        td {
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php
    $conversionRates = array(
        "USD" => 1.0,
        "CAD" => 1.35,
        "EUR" => 0.92 
    );

    $fromValue = '';
    $toValue = '';
    $fromCurrency = isset($_GET['fromCurrency']) ? $_GET['fromCurrency'] : 'USD';
    $toCurrency = isset($_GET['toCurrency']) ? $_GET['toCurrency'] : 'USD';

    function convertCurrency($amount, $fromCurrency, $toCurrency, $rates) {
        $amountInUSD = $amount / $rates[$fromCurrency];
        $convertedAmount = $amountInUSD * $rates[$toCurrency];
        return $convertedAmount;
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["fromValue"])) {
        $fromValue = $_GET["fromValue"];
        $toValue = convertCurrency($fromValue, $fromCurrency, $toCurrency, $conversionRates);
        $toValue = round($toValue, 2);
    }
    ?>

    <form action="activity4.php" method="GET">
        <table>
            <tr>
                <td>From:</td>
                <td><input type="text" name="fromValue" value="<?php echo $fromValue; ?>"/></td>
                <td>Currency:</td>
                <td>
                    <select name="fromCurrency">
                        <option value="USD" <?php echo $fromCurrency == 'USD' ? 'selected' : ''; ?>>USD</option>
                        <option value="CAD" <?php echo $fromCurrency == 'CAD' ? 'selected' : ''; ?>>CAD</option>
                        <option value="EUR" <?php echo $fromCurrency == 'EUR' ? 'selected' : ''; ?>>EUR</option>
                    </select>
                </td>	
            </tr>
            <tr>
                <td>To:</td>
                <td><input type="text" name="toValue" value="<?php echo $toValue; ?>" readonly/></td>
                <td>Currency:</td>
                <td>
                    <select name="toCurrency">
                        <option value="USD" <?php echo $toCurrency == 'USD' ? 'selected' : ''; ?>>USD</option>
                        <option value="CAD" <?php echo $toCurrency == 'CAD' ? 'selected' : ''; ?>>CAD</option>
                        <option value="EUR" <?php echo $toCurrency == 'EUR' ? 'selected' : ''; ?>>EUR</option>
                    </select>
                </td>	
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="convert"/></td>	
            </tr>
        </table>
    </form>		
</body>
</html>
