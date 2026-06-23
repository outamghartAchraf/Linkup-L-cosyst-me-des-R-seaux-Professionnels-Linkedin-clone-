# LinkUp - Professional Networking Platform

## 📌 Project Overview

LinkUp is a professional networking platform inspired by LinkedIn. It allows users to create professional profiles, publish posts, and interact with content shared by the community.

The project is built with Laravel and follows the MVC architecture using Eloquent ORM, Blade templates, and MySQL.

---

## 🎯 Objectives

* Practice Laravel fundamentals.
* Design and implement relational databases using migrations.
* Work with Eloquent relationships.
* Build a professional social network feed.
* Apply MVC architecture and Laravel best practices.

---

## 🛠 Technologies Used

* PHP 8+
* Laravel 12
* MySQL
* Bootstrap 5
* Eloquent ORM
* Blade Templates

---

## 📂 Project Structure

```text
app/
├── Http/
│   └── Controllers/
│       └── PostController.php

├── Models/
│   ├── User.php
│   └── Post.php

database/
└── migrations/
    ├── create_users_table.php
    └── create_posts_table.php

resources/
└── views/
    ├── feed.blade.php
    └── layouts/
        └── app.blade.php

routes/
└── web.php
```

---

## 🗄 Database Structure

### Users Table

| Column     | Type              |
| ---------- | ----------------- |
| id         | bigint            |
| name       | string            |
| email      | string            |
| password   | string            |
| headline   | string            |
| company    | string (nullable) |
| image_url  | string (nullable) |
| timestamps | timestamps        |

### Posts Table

| Column     | Type        |
| ---------- | ----------- |
| id         | bigint      |
| user_id    | foreign key |
| content    | text        |
| timestamps | timestamps  |

---

## 🔗 Eloquent Relationships

### User Model

A user can publish multiple posts.

```php
public function posts()
{
    return $this->hasMany(Post::class);
}
```

### Post Model

A post belongs to one user.

```php
public function user()
{
    return $this->belongsTo(User::class);
}
```

---

## 🚀 Features Implemented

### Authentication

* User Registration
* User Login
* User Logout

### Feed

* Display all posts
* Order posts from newest to oldest
* Show author's name
* Show author's headline
* Show author's profile image

### Profile Information

* Name
* Professional headline
* Company
* Profile picture

---

## 📖 User Stories

### US 1.1 - News Feed

As a LinkUp user,

I want to access the `/feed` page,

So that I can view all posts shared by the community sorted by the most recent first.

### Acceptance Criteria

* Route `/feed` calls `PostController@index`
* Posts are retrieved using Eloquent
* Data is passed to a Blade view

---

### US 1.2 - Author Information

As a user,

I want to see the author's profile information on each post,

So that I can understand their professional background.

### Acceptance Criteria

* Author name displayed
* Author headline displayed
* Author image displayed
* Eloquent relationship used:

```php
$post->user->name
```

---

## ⚙ Installation

### Clone Repository

```bash
git clone https://github.com/your-username/linkup.git
cd linkup
```

### Install Dependencies

```bash
composer install
```

### Configure Environment

```bash
cp .env.example .env
```

### Generate Application Key

```bash
php artisan key:generate
```

### Configure Database

Update the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=linkup
DB_USERNAME=root
DB_PASSWORD=
```

### Run Migrations

```bash
php artisan migrate
```

### Start Server

```bash
php artisan serve
```

Application available at:

```text
http://127.0.0.1:8000
```

---

## 📸 Future Improvements

* Comments System
* Likes & Reactions
* User Connections
* Search Users
* Messaging System
* Notifications
* Recruiter Dashboard

---

## 👨‍💻 Author

Developed as part of the Web & Mobile Web Developer training program.

Project: LinkUp – Professional Networking Platform.
