<?php
include_once "proses/koneksi.php"; 
$kon = new Koneksi(); 

// Fetching the data for ID 1
$result = $kon->kueri("SELECT `id`, `area1`, `area2`, `area3` FROM `tb_kondisipeta` WHERE `id` = 1");
$data = $kon->hasil_data($result); // Get one row of data

// Initialize area variables
$area1Status = '';
$area2Status = '';
$area3Status = '';

// If the data exists, populate the area variables
if ($data) {
    $area1Status = $data['area1'];
    $area2Status = $data['area2'];
    $area3Status = $data['area3'];
}

// Status options
$statusOptions = ['buruk', 'sedang', 'normal'];

// Wind directions
$arahMataAngin = ['utara', 'timurlaut', 'timur', 'selatan', 'baratdaya', 'barat', 'baratlaut'];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $newArea1 = $_POST['area1'];
    $newArea2 = $_POST['area2'];
    $newArea3 = $_POST['area3'];
    $selectedWindDirection = $_POST['windDirection'];

    // Update the database
    $updateQuery = "UPDATE `tb_kondisipeta` SET `area1` ='$newArea1', `area2` = '$newArea2', `area3` = '$newArea3' WHERE `id` = 1";
    $stmt = $kon->kueri($updateQuery);

    $updateQuerys = "UPDATE `tb_kondisipeta` SET `area1` ='$selectedWindDirection' WHERE `id` = 2";
    $stmts = $kon->kueri($updateQuerys);

    // Redirect or refresh page to see changes
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Status Area</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Pilih Status untuk Peta</h2>
    <form action="" method="post">
        <!-- Area 1 Dropdown -->
        <div class="form-group">
            <label for="area1Select">Pilih Area 1:</label>
            <select class="form-control" name="area1" id="area1Select">
                <option value="" <?php echo ($area1Status === '') ? 'selected' : ''; ?>>--Pilih Status--</option>
                <?php foreach ($statusOptions as $status): ?>
                    <option value="<?php echo $status; ?>" <?php echo ($area1Status === $status) ? 'selected' : ''; ?>>
                        <?php echo $status; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Area 2 Dropdown -->
        <div class="form-group">
            <label for="area2Select">Pilih Area 2:</label>
            <select class="form-control" name="area2" id="area2Select">
                <option value="" <?php echo ($area2Status === '') ? 'selected' : ''; ?>>--Pilih Status--</option>
                <?php foreach ($statusOptions as $status): ?>
                    <option value="<?php echo $status; ?>" <?php echo ($area2Status === $status) ? 'selected' : ''; ?>>
                        <?php echo $status; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Area 3 Dropdown -->
        <div class="form-group">
            <label for="area3Select">Pilih Area 3:</label>
            <select class="form-control" name="area3" id="area3Select">
                <option value="" <?php echo ($area3Status === '') ? 'selected' : ''; ?>>--Pilih Status--</option>
                <?php foreach ($statusOptions as $status): ?>
                    <option value="<?php echo $status; ?>" <?php echo ($area3Status === $status) ? 'selected' : ''; ?>>
                        <?php echo $status; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Wind Direction Dropdown -->
        <div class="form-group">
            <label for="windDirectionSelect">Pilih Arah Mata Angin:</label>
            <select class="form-control" name="windDirection" id="windDirectionSelect">
                <option value="">--Pilih Arah--</option>
                <?php foreach ($arahMataAngin as $direction): ?>
                    <option value="<?php echo $direction; ?>"><?php echo $direction; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Set Peta</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
