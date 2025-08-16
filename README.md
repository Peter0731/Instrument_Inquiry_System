# 醫療儀器查詢系統
  
> 📄 此專案資料已完成匿名化，僅供作品展示與學習，不建議直接用於生產環境。

---

## 目錄
- [專案簡介](#專案簡介)
- [核心功能](#核心功能)
- [系統架構與技術](#系統架構與技術)
- [安裝與快速開始](#安裝與快速開始)
- [資料表與權限模型](#資料表與權限模型)
- [Excel匯入與匯出](#excel-匯入與匯出)
- [常見問題FAQ](#常見問題-faq)

---

## 專案簡介
內部使用的**醫療儀器資訊查詢／維護系統**，支援快速檢索「醫院名稱、儀器型號、裝機日期、序號、備註」，提供**三層角色權限（Admin/User/Viewer）**，並支援 **Excel模板匯入／搜尋結果匯出**。  
以**易上手與低導入成本**為目標，適合中小企業或經銷商用於設備管理。

---

## 核心功能
- 🔍 **關鍵字搜尋＋分頁**：支援多欄位模糊搜尋，列表分頁。
- ✏️ **CRUD**：新增／編輯／刪除／瀏覽儀器資料。
- 👥 **RBAC三層權限**：
  - **Administrator**：使用者與角色管理、全域資料維護。
  - **User**：僅可編輯**自己建立**的資料（列級限制）。
  - **Viewer**：唯讀存取。
- 📥 **Excel模板匯入**：提供匯入範本，基本欄位與日期格式檢核、特殊字元過濾。
- 📤 **Excel匯出**：可將**目前搜尋結果**匯出。
- 🧰 **操作體驗**：固定標題列、條件保留、批次刪除、錯誤訊息提示。

---

## 系統架構與技術
- **前端**：HTML、CSS、JavaScript、jQuery、Bootstrap。
- **後端**：PHP（mysqli）。
- **資料庫**：MySQL / MariaDB。
- **批次作業**：PHPExcel（.xlsx讀寫）。
- **相依套件**：`ext-mysqli`、`ext-xml`、`ext-zip`（依PHPExcel需求）。

> 📦 主要目錄
```
/ (web root)
├─ index.php                # 主頁與列表/搜尋
├─ login.php                # 登入頁
├─ login-verification.php   # 登入驗證（MD5比對）
├─ manageuser.php           # 使用者管理（Admin）
├─ excel.php                # 匯出
├─ file-upload.php          # 匯入處理（PHPExcel）
├─ ImportData.php           # 匯入對話框
├─ config.php               # DB連線設定
├─ css/, icons/, Classes/   # 樣式、圖示、PHPExcel
└─ src/
   ├─ eikendata.sql         # 資料表與示範資料
   ├─ Import_Template.xlsx  # 匯入範本
   └─ eikentable.csv        # 範例資料
```

---

## 安裝與快速開始
### 1) 環境需求
- PHP **8.0+**（相容PHPExcel的版本）。
- MySQL 8 / MariaDB 10+。
- 開啟PHP擴充：`mysqli`、`xml`、`zip`。

### 2) 匯入資料庫
建立資料庫並匯入 `src/eikendata.sql`：
```bash
mysql -u root -p -e "CREATE DATABASE eiken_db DEFAULT CHARACTER SET utf8mb4;"
mysql -u root -p eiken_db < src/eikendata.sql
```

### 3) 設定資料庫連線
```php
<?php
$host = 'localhost';
$username = 'root';
$password = 'your_password';
$usedb = 'eiken_db';

$connection = mysqli_connect($host, $username, $password);
mysqli_set_charset($connection, 'utf8mb4');
mysqli_select_db($connection, $usedb);
?>
```

### 4) 啟動與登入
- 將專案放至Web Root（如XAMPP的 `htdocs` 或Nginx/Apache專案目錄）。
- 以瀏覽器開啟 `http://localhost/`。
- 匯入的SQL內含 **Admin/User/Viewer** 三個**示範帳號**（MD5密碼雜湊）；**請自行重設密碼**。

> 重設示範密碼（若沿用MD5）：  
> `UPDATE users SET Password = MD5('your_new_password') WHERE Account='admin';`

---

## 資料表與權限模型
**主要資料表**
- `eikentable`：`Id, name, ins, time (DATE), sn, remarks, UserID`。
- `users`：`UserID (UUID), Account, Password (MD5)`。
- `roles`：`RoleID (1=Administrator, 2=User, 3=Viewer), RoleName`。
- `usersrole`：`UserID, RoleID`（多對多關聯）。

**列級限制**
- `User` 僅能編輯 `eikentable.UserID = 當前使用者` 的資料。
- `Admin` 具全域維護與使用者管理權限。
- `Viewer` 唯讀。

---

## Excel 匯入與匯出
- **匯入**：透過 `Import_Template.xlsx` 範本，從第 6 列開始讀取欄位：  
  `name（機構）、ins（型號）、time（日期）、sn（序號）、remarks（備註）`
  - 檢核：必填欄位、**日期格式**（支援 文字「YYYY/MM/DD」與日期型「MM/DD/YYYY」自動轉換為 `YYYY-MM-DD`）、**特殊字元過濾**（`' " < > ? / \ | *`）
- **匯出**：`excel.php` 依**目前搜尋結果**輸出Excel（xls格式表格）。

---

## 常見問題 FAQ
- **Q：匯入時顯示日期格式錯誤？**  
  A：請確認日期為 `YYYY/MM/DD`（文字）或 `MM/DD/YYYY`（日期型），系統會自動轉換成 `YYYY-MM-DD`；檢查是否含未允許的特殊字元。
- **Q：無法登入？**  
  A：請先檢查資料庫連線設定（`config.php`），並以SQL更新示範帳號的密碼雜湊。