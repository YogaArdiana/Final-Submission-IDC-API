
# API Documentation


This API is designed to display book data, including the author's name and category. It provides a structured and efficient way to retrieve comprehensive book information, ensuring easy access and management. The API maintains a consistent JSON format, making it reliable.



## 🚀Installation

#### Pre Requisite

| Tools |  Version                |
| :-------- |  :------------------------- |
| `PHP` |    8.3.8 or Higer |

#### Clone This Repository

```bash
git clone https://github.com/YogaArdiana/Final-Submission-IDC-API.git

cd Final-Submission-IDC-API
```
#### Create .env file and setup database

```bash
DB_CONNECTION= sqlite / mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= final-submision-db
DB_USERNAME=root
DB_PASSWORD=

```
#### Generate Key

```bash
php artisan key:generate
```

#### Migrate Table

```bash
php artisan migrate
```
#### Seed Tables
To Generate 500 books Data, 50 Author Data, 20 Categories Data

```bash
php artisan db:seed
```
#### Run

```bash
php artisan serve
```
#### Output

```bash
http://localhost:8000/
```





## 🚀Allowed HTTP request

#### Explanation

| Request |  Description                |
| :-------- |  :------------------------- |
| `GET` |  Retrieves data from the API, |
| `POST` |   To send POST request to the API ( Create data )|
| `PUT` |  To send PUT request to the API ( Update data )|
| `DELETE` |  To delete data on the API| 





