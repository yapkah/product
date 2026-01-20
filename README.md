# Product
```
Product/
├─ app/
│  ├─ Http/
│  │  ├─ Controllers/
│  │  │     ├─ ProductController.php
│  │  │     └─ CategoryController.php
│  │  └─ Requests/
│  │        ├─ StoreProductRequest.php
│  │        └─ UpdateProductRequest.php
├─ app/Exports/
│  └─ ProductsExport.php
├─ database/
│  ├─ migrations/
│  │     ├─ create_categories_table.php
│  │     └─ create_products_table.php
│  └─ seeders/
│        └─ CategorySeeder.php
├─ resources/views/
│  ├─ layouts/
│  │     └─ app.blade.php
│  ├─ products/
│  │     ├─ index.blade.php
│  │     ├─ create.blade.php
│  │     ├─ edit.blade.php
│  │     └─ show.blade.php
│  └─ categories/
│        ├─ index.blade.php
│        ├─ create.blade.php
│        └─ edit.blade.php
├─ routes/web.php
├─ tests/Feature/ProductTest.php
└─ .env
 ```