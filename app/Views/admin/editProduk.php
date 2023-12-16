<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?= $this->include('/admin/layout/aside') ?>

<div id="content-wrapper" class="d-flex flex-column">
    <?= $this->include('/admin/layout/navbar') ?>

    <div class="container-fluid">
        <div class="container mt-5">
            <h2>Product Entry Form</h2>
            <form action="/path-to-your-product-insert-script" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="Nama_Barang" required>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Product Price</label>
                    <input type="text" class="form-control" id="productPrice" name="Harga_Barang" required>
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Product Description</label>
                    <textarea class="form-control" id="productDescription" name="Deskripsi_Belanja" rows="3"
                        required></textarea>
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input class="form-control" type="file" id="productImage" name="Gambar" required>
                </div>
                <div class="mb-3">
                    <label for="discountCode" class="form-label">Discount Code</label>
                    <select class="form-select" id="discountCode" name="Kode_Diskon">
                        <option selected>Choose...</option>
                        <option value="DISCOUNT1">DISCOUNT1</option>
                        <option value="DISCOUNT2">DISCOUNT2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Category" class="form-label">Category</label>
                    <select class="form-select" id="Category" name="ID_Kategori">
                        <option selected>Choose...</option>
                        <!-- Populate with actual sub-categories -->
                        <option value="1">Electronics</option>
                        <option value="2">Books</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subCategory" class="form-label">Sub Category</label>
                    <select class="form-select" id="subCategory" name="ID_SubKategori">
                        <option selected>Choose...</option>
                        <!-- Populate with actual sub-categories -->
                        <option value="1">Electronics</option>
                        <option value="2">Books</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="flashSale" class="form-label">Flash Sale</label>
                    <select class="form-select" id="flashSale" name="ID_FlashSale">
                        <option selected>Choose...</option>
                        <!-- Populate with actual flash sale options -->
                        <option value="1">New Year Sale</option>
                        <option value="2">Black Friday</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>