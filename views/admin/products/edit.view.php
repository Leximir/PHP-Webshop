<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/header.php") ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-2 md:mt-0">

                    <form method="POST" action="update_product.php">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">

                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                <!-- Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                    <div class="mt-1">
                                        <input type="text" name="name" id="name"
                                               value="<?= htmlspecialchars($product['name'] ?? '') ?>"
                                               maxlength="64"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                               required>
                                        <?php if (!empty($errors['name'])): ?>
                                            <p class="text-red-500 text-xs mt-2"><?= htmlspecialchars($errors['name']) ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <div class="mt-1">
                                    <textarea id="description" name="description" rows="4"
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                              required><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                                        <?php if (!empty($errors['description'])): ?>
                                            <p class="text-red-500 text-xs mt-2"><?= htmlspecialchars($errors['description']) ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price (in cents)</label>
                                    <div class="mt-1">
                                        <input type="number" name="price" id="price"
                                               value="<?= htmlspecialchars($product['price'] ?? '') ?>"
                                               min="0"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                               required>
                                        <?php if (!empty($errors['price'])): ?>
                                            <p class="text-red-500 text-xs mt-2"><?= htmlspecialchars($errors['price']) ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Amount -->
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price (in cents)</label>
                                    <div class="mt-1">
                                        <input type="number" name="price" id="price"
                                               value="<?= htmlspecialchars($product['amount'] ?? '') ?>"
                                               min="0"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                               required>
                                        <?php if (!empty($errors['amount'])): ?>
                                            <p class="text-red-500 text-xs mt-2"><?= htmlspecialchars($errors['amount']) ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="mt-6">
                                    <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>

                                    <!-- Prikaz trenutne slike -->
                                    <?php if (!empty($product['image'])): ?>
                                        <div class="mt-2">
                                            <img src="public/images/products/<?= htmlspecialchars($product['image']) ?>"
                                                 alt="Product Image"
                                                 class="h-40 w-40 object-cover rounded-md border border-gray-300 shadow-sm">
                                        </div>
                                    <?php else: ?>
                                        <p class="text-gray-500 text-sm mt-2">No image uploaded yet.</p>
                                    <?php endif; ?>

                                    <!-- Dugme za promenu slike -->
                                    <div class="mt-3">
                                        <input type="file" name="image" id="image"
                                               accept="image/*"
                                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                        <?php if (!empty($errors['image'])): ?>
                                            <p class="text-red-500 text-xs mt-2"><?= htmlspecialchars($errors['image']) ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <!-- Buttons -->
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end">
                                <a href="products.php"
                                   class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Cancel
                                </a>
                                <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

<?php require base_path("views/partials/footer.php") ?>