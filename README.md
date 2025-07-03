# 📂 DYNAMIC_NOTES_APP-using-PHP PHP MVC Project

A modern, lightweight PHP MVC-style web application featuring custom routing, authentication, validation, flash messaging, and a robust testing setup with Pest and PHPUnit.

---

## 🚀 Features

- Custom routing and controllers  
- Session-based authentication  
- Form validation with error flashing  
- Middleware for route protection  
- PDO-based database access  
- Modular, Tailwind CSS-styled views  
- Pest & PHPUnit for testing  

---

## 🛠️ Tech Stack

- PHP 8+  
- Composer (dependency management & autoloading)  
- PDO (MySQL database access)  
- Pest & PHPUnit (testing)  
- Tailwind CSS (frontend styling)  
- XAMPP (recommended for local dev)  

---

## 📦 Folder Structure

```
/Core          - Core framework classes (Router, Authenticator, Session, etc.)
/Http
  /controllers - Controllers (route handlers)
  /Forms       - Form validation classes
/views         - PHP views (with Tailwind CSS)
/public        - Web root (index.php is the front controller)
/tests         - Pest/PHPUnit tests
/vendor        - Composer dependencies
```

---

## ⚡️ Quick Start

1. **Clone the Repository**
    ```bash
    git clone <your-repo-url>
    cd Dynamic_Notes_APP-using-PHP
    ```
2. **Install Dependencies**
    ```bash
    composer install
    ```
3. **Configure Database**
    - Edit `config.php` with your database credentials.
    - Create a `user` table with at least `email` (VARCHAR) and `password`
   (VARCHAR) columns.
    - Create a `notess` table with the following columns: ̰
      - `id` (INT, primary key, auto-increment)
      - `body` (TEXT)
      - `user_id` (INT, foreign key referencing `user(id)`)
    4. **Set Up XAMPP (or any Apache+PHP stack)**
    - Place the project in your XAMPP `htdocs` directory.
    - Ensure Apache and MySQL are running.
5. **Set Up Virtual Host (Optional)**
    - Configure Apache to point `/Dynamic_Notes_APP-using-PHP/public` as the web root.
6. **Run the Application**
    - Visit: [http://localhost/Dynamic_Notes_APP-using-PHP/public](http://localhost/Dynamic_Notes_APP-using-PHP/public)

---

## 🧪 Running Tests

Run all tests with Pest:

```bash
./vendor/bin/pest
```

Or run PHPUnit:

```bash
./vendor/bin/phpunit
```

---

## 🔑 Authentication

- User login is handled via `/Dynamic_Notes_APP-using-PHP/login`.  
- Passwords are hashed using PHP’s `password_hash`.  
- Sessions are regenerated on login for security.

### 📝 Example Authenticator Usage

```php
$auth = new \Core\Authenticator();
if ($auth->attempt($email, $password)) {
    // Login successful
} else {
    // Login failed
}
```

---

## 🧩 Customization

- **Routes:** Edit `routes.php` to add or modify routes.  
- **Controllers:** Add new controllers in `Http/controllers`.  
- **Views:** Create or edit views in `views`.  
- **Middleware:** Add route protection via middleware in `Core/Middleware`.

---

## 🛡️ Security Notes

- Always use prepared statements for DB queries (already implemented).  
- Consider adding CSRF protection for forms.  
- Store sensitive config (like DB passwords) outside version control.

---

## 🛠️ Troubleshooting

- **Blank page or errors?**  
  - Check your PHP error log and ensure `display_errors` is enabled in `php.ini`.
- **Login not working?**  
  - Make sure your `user` table exists and contains at least one user with a hashed password.
- **Tests not running?**  
  - Ensure Pest and PHPUnit are installed with Composer.

---

## 🤝 Contributing

1. Fork the repo  
2. Create your feature branch (`git checkout -b feature/foo`)  
3. Commit your changes  
4. Push to the branch  
5. Open a Pull Request

---

## 📚 License

MIT

---

## ❓ Need Help?

Open an issue or contact the maintainer.

