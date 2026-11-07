# Banglar Alo IT - Newspaper Demo Website

A modern Laravel-based online newspaper and media portal developed and customized for Banglar Alo IT.

## Features
- **Frontend News Portal:** Breaking news, categories, tags, video gallery, polls, breaking headlines, search by date and location.
- **Admin Dashboard:** Full content management system, category management, user/reporter roles, advertisements, sitemap, language management.
- **Reporter Dashboard:** Staff reporters can draft, submit, and manage their news articles and media.

## Requirements
- PHP >= 8.1 (PHP 8.2 Recommended)
- MySQL / MariaDB
- Composer
- Required PHP Extensions: `pdo_mysql`, `curl`, `mbstring`, `gd`, `fileinfo`, `openssl`, `exif`

## Setup & Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/tanvir210111/banglar-alo-it-newspaper-demo-website-.git
   cd banglar-alo-it-newspaper-demo-website-
   ```

2. **Import Database:**
   Import `creativedesignbd_news1.sql` into your MySQL/MariaDB database (e.g. `news1`):
   ```bash
   mysql -u root -p news1 < creativedesignbd_news1.sql
   ```

3. **Install Dependencies:**
   ```bash
   cd news1/project
   composer install
   ```

4. **Environment Configuration:**
   Copy `.env.example` to `.env` in `news1/project`:
   ```bash
   cp .env.example .env
   ```
   Configure your database credentials in `.env`.

5. **Run Development Server:**
   ```bash
   # From news1 directory:
   php -S 127.0.0.1:8000 server.php
   ```
   Or on Windows, simply double-click `start_server.bat`!

---
© All Rights Reserved: [Banglar Alo IT](https://banglaraloit.tech/)
