<?php
include './templates/navbar.php';
require('koneksi.php');
$result = mysqli_query($koneksi, "SELECT * FROM items");
?>
<div class="p-6">
    <h1 class="font-bold text-3xl mb-6 text-white">Welcome To E-Stock</h1>
    <div class="w-full grid grid-cols-4 gap-4">
        <?php
        foreach ($result as $index => $row) :
            $price = number_format($row['price'], 0, ',', '.');
        ?>
            <button data-modal-target="crud-modal-<?= $row['item_id'] ?>" data-modal-toggle="crud-modal-<?= $row['item_id'] ?>" class="bg-white hover:bg-gray-100 hover:ring-1 hover:ring-gray-300 hover:-translate-y-1 transition-all shadow-md rounded-md flex flex-col gap-2 w-full h-72 text-left relative">
                <div class="w-full h-1/2 rounded-t-md">
                    <img src="assets/img/<?= $row['img'] ?>" class="w-full h-full object-cover rounded-t-md" alt="">
                </div>
                <div class="px-4 relative h-full">
                    <h3 class="font-bold text-lg line-clamp-2"><?= $row['name'] ?></h3>
                    <p class="text-sm line-clamp-3"><?= $row['description'] ?></p>
                    <p class="absolute bottom-3 text-sm text-red-600">Stok: <?= $row['stock'] ?></p>
                </div>
            </button>
        <?php endforeach ?>
    </div>
</div>

<!-- Main modal -->
<?php
foreach ($result as $index => $row) :
    $price = number_format($row['price'], 0, ',', '.');
?>
    <div id="crud-modal-<?= $row['item_id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Detail Barang
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal-<?= $row['item_id'] ?>">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 relative">
                    <div class="grid grid-cols-2">
                        <div class="w-64 h-full">
                            <img src="assets/img/<?= $row['img'] ?>" class="h-full w-full object-cover rounded-md" alt="">
                        </div>
                        <div class="">
                            <label class="mb-1 block text-sm font-medium text-gray-900">Nama Buku</label>
                            <div class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <?= $row['name'] ?>
                            </div>

                            <label class="mb-1 block text-sm font-medium text-gray-900">Deskripsi</label>
                            <div class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <?= $row['description'] ?>
                            </div>

                            <label class="mb-1 block text-sm font-medium text-gray-900">Stok</label>
                            <div class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <?= $row['stock'] ?>
                            </div>

                            <label class="mb-1 block text-sm font-medium text-gray-900">Harga</label>
                            <div class="mb-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full">
                                <p class="text-sm text-red-600">Rp.<span class="text-lg"><?= $price ?></span></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>


<?php
include './templates/footer.php'
?>