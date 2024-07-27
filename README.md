# To-Do List API

## Deskripsi
API sederhana untuk pencatatan tugas pribadi. Menggunakan Laravel sebagai backend dengan fitur CRUD, soft delete, dan pengujian otomatis.

## Pengaturan Proyek

1. Clone project
2. composer install
3. copy file .env.example ke .env -> command : "cp .env.example .env"
4. buat DB  -> command : "php artisan db:create"
5. Migrasi data -> command "php artisan migrate"
6. Test -> command "php artisan test"

## Penggunaan API

## Create Task (POST)
POST /api/tasks
Request Body:
{
    "title": "Test Task",
    "description": "This is a test task",
    "status": "Waiting List",
    "due_date": "2024-12-31"
}

## Read All Tasks (GET)
GET /api/tasks

## Read Single Task (GET)
GET /api/tasks/{task_id}

## Update Task (PUT)
PUT /api/tasks/{task_id}
Request Body:
{
    "status": "In Progress"
}

## Delete Task (DELETE)
DELETE /api/tasks/{task_id}
