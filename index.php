<?php
session_start();
if (!isset($_SESSION['equipment'])) {
    $_SESSION['equipment'] = [
        ['name' => 'Laptop', 'serial' => 'L123', 'location' => 'Biuro', 'quantity' => 5],
        ['name' => 'Rzutnik', 'serial' => 'P456', 'location' => 'Sala konferencyjna', 'quantity' => 1]
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = [
        'name' => $_POST['name'] ?? '',
        'serial' => $_POST['serial'] ?? '',
        'location' => $_POST['location'] ?? '',
        'quantity' => (int)($_POST['quantity'] ?? 0)
    ];
    if ($item['name'] && $item['serial'] && $item['location'] && $item['quantity'] > 0) {
        $_SESSION['equipment'][] = $item;
    }
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ewidencja Wyposażenia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Ewidencja Wyposażenia</h1>
    <form method="post" class="mb-8">
        <div class="grid grid-cols-4 gap-4">
            <input type="text" name="name" class="border p-2" placeholder="Nazwa" required>
            <input type="text" name="serial" class="border p-2" placeholder="Numer seryjny" required>
            <input type="text" name="location" class="border p-2" placeholder="Lokalizacja" required>
            <input type="number" name="quantity" class="border p-2" placeholder="Ilość" min="1" required>
        </div>
        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2">Dodaj</button>
    </form>
    <table class="min-w-full bg-white border">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border">Nazwa</th>
                <th class="py-2 px-4 border">Numer seryjny</th>
                <th class="py-2 px-4 border">Lokalizacja</th>
                <th class="py-2 px-4 border">Ilość</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['equipment'] as $item): ?>
            <tr>
                <td class="border px-4 py-2"><?php echo htmlspecialchars($item['name']); ?></td>
                <td class="border px-4 py-2"><?php echo htmlspecialchars($item['serial']); ?></td>
                <td class="border px-4 py-2"><?php echo htmlspecialchars($item['location']); ?></td>
                <td class="border px-4 py-2 text-center"><?php echo htmlspecialchars($item['quantity']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
