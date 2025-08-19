# 🌱 Farming Assistance Web Application

A PHP-based web application supporting **farmers**, **experts**, and **administrators**. Features include crop details, expert consultation, and farmer queries—all managed with Docker.

---

## 📦 Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL (via Docker)
- **Admin Tool:** phpMyAdmin
- **DevOps:** Docker & Docker Compose

---

## 🗂️ Project Structure

```
src/
├── db/
│   ├── config.php
│   ├── project4dbs_custom_export.sql
│   └── test_conn.php
├── imgs/
├── php/
│   ├── admin/
│   │   ├── adminLogin.php
│   │   ├── adminPage.php
│   │   ├── deleteData.php
│   │   ├── getTableContent.php
│   │   ├── insertData.php
│   │   └── updateData.php
│   ├── css/
│   ├── expertise/
│   ├── categoryDetails.php
│   ├── cropDetails.php
│   ├── deleteQuery.php
│   ├── farmer-loginPage.php
│   ├── farmerQueryView.php
│   ├── footer.php
│   ├── header.php
│   ├── index.php
│   ├── Notification.php
│   ├── simple_html_dom.php
│   └── Dockerfile
├── docker-compose.yml
└── Project_F4_Documentation.pdf
```

---

## 🔗 Useful Links

- **Web App:** [http://localhost:2020/php](http://localhost:2020/php)
- **phpMyAdmin:** [http://localhost:8081](http://localhost:8081)
- **Test DB Connection:** [http://localhost:2020/db/test_conn.php](http://localhost:2020/db/test_conn.php)

---

## ⚙️ Docker-Based Setup

### ✅ Prerequisites
- [Docker](https://www.docker.com/get-started) – Container platform
- [Docker Compose](https://docs.docker.com/compose/) – Multi-container orchestration

---

## 🛠️ Installation Steps (Detailed)

1. **Clone the Repository**  
   This will create a local copy of the project.
   ```bash
   git clone https://github.com/Chandansahu7980/Docker_FarmersF4.git
   cd Docker_FarmersF4
   ```

2. **Check Docker Installation**  
   Ensure Docker and Docker Compose are properly installed:
   ```bash
   docker --version   # Should show Docker version
   docker-compose --version   # Should show Docker Compose version
   ```

3. **Build and Start Containers**  
   This command builds images (if not present) and starts all services as defined in `docker-compose.yml`.
   ```bash
   docker-compose up --build
   ```
   - `--build` : Ensures containers are built fresh from Dockerfiles
   - Containers started:
     - `php` : Your PHP website (port 2020)
     - `my-db` : MySQL database (port 3306)
     - `phpmyadmin` : DB admin panel (port 8081)

4. **Access the Web Application & Database Admin**
   - **Web App:** [http://localhost:2020/php](http://localhost:2020/php)
   - **phpMyAdmin:** [http://localhost:8081](http://localhost:8081)

5. **Database Initialization**  
   The database is automatically initialized from the SQL dump file on first run.

6. **Verify Database Connection (Optional)**  
   Test PHP ↔ MySQL connectivity by visiting:
   [http://localhost:2020/src/db/test_conn.php](http://localhost:2020/src/db/test_conn.php)

---

### 🚀 What Do The Commands Do?
- `git clone ...` : Downloads the source code to your local system.
- `cd ...` : Changes directory to the project folder.
- `docker-compose up --build` : Builds and starts all defined containers.
- Accessing URLs (`localhost:2020`, `localhost:8081`) : Opens the app and admin panel in your browser.

---

## 📋 Credentials for phpMyAdmin
- **Username:** `root`
- **Password:** `root`
- **Database:** `farmer_db`

---

## 🐳 Docker Compose Configuration

```yaml
name: Docker_Project_F4
services:
  php:
    build: ./src/php/
    ports:
      - "2020:80"
    volumes:
      - ./src:/var/www/html
      - php-session:/var/lib/php/sessions
    depends_on:
      - my-db

  my-db:
    image: mysql:oracle
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: farmer_db
    ports:
      - "3306:3306"
    volumes:
      - db_data:/var/lib/mysql
      - ./src/db/project4dbs_custom_export.sql:/docker-entrypoint-initdb.d/init.sql

  phpmyadmin:
    image: phpmyadmin:latest
    environment:
      PMA_HOST: my-db
      PMA_PORT: 3306
    ports:
      - "8081:80"

volumes:
  db_data:
  php-session:
```

---

## 📄 Features Overview

- **Admin Panel:** Add, update, and delete farming data
- **Expert Module:** Handle user queries, provide crop advice
- **Farmer Portal:** Submit queries, access essential farming content
- **Database Initialization:** SQL dump auto-imported on first run
- **Modular Codebase:** Easy to navigate, edit, and extend

---

## 🧾 Documentation & Screenshots

- Detailed system flow, use case diagrams, and screenshots are included in:
  - `Project_F4_Documentation.pdf`

---

## 💡 Troubleshooting

#### ❌ Database Not Found?
- Ensure Docker containers are running:
    ```bash
    docker-compose up
    ```
- Check `farmer_db` in phpMyAdmin: [http://localhost:8081](http://localhost:8081)

#### ��� Permission Issues on Volumes?
- Run Docker with elevated privileges (admin/root)
- Ensure Docker Desktop has file system access to your project directory

---

## ❓ Frequently Asked Questions (FAQ)

**Q1: Where can I find screenshots of the application?**
- All UI screenshots are provided in `Project_F4_Documentation.pdf` in the repository root.

**Q2: The database is empty or missing tables, what should I do?**
- Make sure you started containers using `docker-compose up --build`.
- Check if `project4dbs_custom_export.sql` exists in `/src/db/` directory.
- Restart the containers if needed.

**Q3: I cannot access phpMyAdmin.**
- Ensure Docker is running and containers are up.
- Visit [http://localhost:8081](http://localhost:8081) in your browser.

**Q4: How do I update/rebuild the containers after making code changes?**
- Run `docker-compose down` to stop containers.
- Then run `docker-compose up --build` to rebuild and restart.

**Q5: How can I contribute to this project?**
- Fork the repo, make changes, and submit a pull request. For major changes, open an issue first.

---

## 🤝 Contribution

Feel free to **fork** and submit **pull requests**. For major changes, open an issue first to discuss your ideas.

---

## 📜 License

MIT License

---

> 🌾 *Empowering farmers through digital solutions — built with care, code, and community.*
