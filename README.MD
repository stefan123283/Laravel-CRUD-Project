# How to use the project?
1. Clone the project in the desired location using the command ***"git clone https://github.com/stefan123283/Laravel-CRUD-Project.git"***
2. Configure the ***.env*** file and create the specified database
3. Delete the ***public/storage*** folder and execute the command ***"php artisan storage:link"***
4. Open the ***Product.php*** inside the ***/app/Models*** folder and specify which fields you need
> [!NOTE]
> If you do not want to modify the predefined fields, you can skip the steps 4-7
5. Update the ***2025_05_07_093313_create_products_table.php*** file inside the ***/database/migrations*** folder according to the fields you specified in the previous step
6. Open the ***ProductController.php*** file inside the ***/app/Http/Controllers*** folder and update the store and update function according to the fields you specified in step number ***4***
7. Modify the views inside the ***/resources/views/products*** according to the fields you specified in step number ***4***
8. Execute the command ***"php artisan migrate"***
9. Start the application using the command ***"php artisan serve"***
