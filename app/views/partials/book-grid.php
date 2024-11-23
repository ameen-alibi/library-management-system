<?php foreach ($books as $book): ?>
    <div class="bg-white p-4 rounded-xl shadow-md hover:shadow-2xl transition-transform transform hover:scale-105 hover:-translate-y-2 flex flex-col h-full">
        <img src="<?= $book['image_url'] ?>" alt="<?= htmlspecialchars($book['title']) ?>" class="w-full h-48 object-cover rounded-lg mb-4">
        <h3 class="text-xl font-bold text-teal-800 mb-2"><?= htmlspecialchars($book['title']) ?></h3>
        <p class="text-sm text-gray-700 mb-2">
            <strong>Author:</strong> <?= htmlspecialchars($book['author']) ?>
        </p>
        <p class="text-gray-600 text-sm mb-4 overflow-hidden text-ellipsis">
            <?= htmlspecialchars(substr($book['description'] ?? 'No description available.', 0, 100)) ?>...
        </p>
        <div class="mt-auto">
            <button class="w-full py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700">Borrow</button>
        </div>
    </div>
<?php endforeach; ?>