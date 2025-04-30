# 🧾 GST Billing System - Laravel 11

A complete GST Billing System built using **Laravel 11**. This system allows businesses to manage invoices, customers, products, and calculate GST for each transaction.

---

## 🚀 Features

- ✅ Customer management (CRUD)
- ✅ Product/Service catalog with GST rates
- ✅ Invoice creation with GST calculation (CGST, SGST, IGST)
- ✅ PDF invoice generation
- ✅ Dashboard with analytics
- ✅ Role-based user access
- ✅ Export invoices to Excel or PDF
- ✅ Tax summary reports

---

## 🛠️ Tech Stack

- **Framework**: Laravel 11
- **Frontend**: Blade, Bootstrap 5 / Tailwind (customizable)
- **Database**: MySQL
- **Authentication**: Laravel Breeze or Laravel Jetstream

---

## 📦 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/gst-billing-laravel11.git
cd gst-billing-laravel11

```
### 2. Install Dependencies

```bash     
composer install
npm install && npm run dev
```
### 3. Environment Configuration

Copy the `.env.example` file to `.env` and set up your database credentials.

```bash
cp .env.example .env    
php artisan key:generate
```
### 4. Migrate the Database

```bash 
php artisan migrate --seed
```
### 5. Start the Development Server

```bash     
php artisan serve
```
### 6. Access the Application       
Open your browser and navigate to `http://localhost:8000`.

### 7. Login Credentials 
```bash
Email: admin@example.com
Password: password
```
---
## 📂 Folder Structure

```            
app/
├── Models/
│   ├── Customer.php
│   ├── Product.php
│   └── Invoice.php
├── Http/Controllers/
│   ├── CustomerController.php
│   ├── ProductController.php
│   └── InvoiceController.php
resources/views/
├── invoices/
├── customers/
└── dashboard.blade.php

```
---

##📊 GST Logic

1. GST calculated dynamically based on product tax slab

2. Supports both intra-state (CGST + SGST) and inter-state (IGST) billing

```bash
$cgst = ($amount * $product->cgst) / 100;
$sgst = ($amount * $product->sgst) / 100;
$igst = ($amount * $product->igst) / 100;
$total = $amount + $cgst + $sgst + $igst;
```
--- 

## 📄 License   
This project is licensed under the MIT License.

---

## 🙋‍♂️ Contributions
Feel free to use, modify, and distribute it as per your needs.

---