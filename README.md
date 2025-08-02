# 🌱 Farming Assistance Web Application

This is a PHP-based web application designed to support **farmers**, **experts**, and **administrators**. It offers features like crop details, expert consultation, and farmer queries, all managed through a role-based system. The application runs in a **Dockerized** environment using PHP, MySQL, and phpMyAdmin.

---

## 📦 Technologies Used

- **Frontend**: HTML, CSS, JavaScript  
- **Backend**: PHP  
- **Database**: MySQL (via Docker)  
- **Admin Tool**: phpMyAdmin  
- **DevOps**: Docker & Docker Compose  

---

## 🗂️ Project Structure

```
src/
├── db/
│ ├── config.php
│ ├── project4dbs_custom_export.sql # SQL dump to auto-import
│ └── test_conn.php
├── imgs/
├── php/
│ ├── admin/
│ │ ├── adminLogin.php
│ │ ├── adminPage.php
│ │ ├── deleteData.php
│ │ ├── getTableContent.php
│ │ ├── insertData.php
│ │ └── updateData.php
│ ├── css/
│ ├── expertise/
│ ├── categoryDetails.php
│ ├── cropDetails.php
│ ├── deleteQuery.php
│ ├── farmer-loginPage.php
│ ├── farmerQueryView.php
│ ├── footer.php
│ ├── header.php
│ ├── index.php
│ ├── Notification.php
│ ├── simple_html_dom.php
│ └── Dockerfile
├── docker-compose.yml
└── Project_F4_Documentation.pdf
```


---

## ⚙️ Docker-Based Setup

### ✅ Prerequisites

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/)

---

### 🚀 How to Run the Project

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/your-repo-name.git
   cd your-repo-name
   
2. **Start the Containers**

   Run the following command in your project root:

   ```bash
   docker-compose up --build

### This will spin up:

- **php**: Runs your application on port **2020**
- **my-db**: MySQL database with `farmer_db` schema
- **phpmyadmin**: Accessible on port **8081**

---

### 🚀 Visit the Application

- 🌐 **Web App**: [http://localhost:2020](http://localhost:2020)
- 🗄️ **phpMyAdmin**: [http://localhost:8081](http://localhost:8081)

#### 🧾 phpMyAdmin Credentials:

- **Username**: `root`  
- **Password**: `root`  
- **Database**: `farmer_db`

---

### ✅ Verify Database Connection (Optional)

You can verify the connection between PHP and MySQL by opening this in your browser:

🔗 [http://localhost:2020/src/db/test_conn.php](http://localhost:2020/src/db/test_conn.php)

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
## 📄 Features Overview

- **Admin Panel**: Add, update, and delete farming data  
- **Expert Module**: Handle user queries and provide crop advice  
- **Farmer Portal**: Submit queries and access essential farming content  
- **Database Initialization**: SQL dump is automatically imported on first container run  
- **Modular Codebase**: Easy to navigate, edit, and extend  

---

## 🧾 Documentation

Detailed system flow, use case diagrams, and functionality descriptions can be found in:

📄 `Project_F4_Documentation.pdf`

---

## 💡 Troubleshooting

### ❌ Database Not Found?

- Ensure Docker containers are running using:
  ```bash
  docker-compose up
### ❌ Database Not Found?

- Check that the `farmer_db` database is visible in phpMyAdmin:  
  🔗 [http://localhost:8081](http://localhost:8081)

---

### ❌ Permission Issues on Volumes?

- Run Docker with elevated privileges (administrator/root access)
- Ensure Docker Desktop has file system access to your project directory

---

## 🤝 Contribution

Feel free to **fork** this repository and submit **pull requests**.  
For major changes, please open an issue first to discuss your ideas.

---

## 📜 License

This project is open-source and available under the **MIT License**.

---

> 🌾 *Empowering farmers through digital solutions — built with care, code, and community.*
