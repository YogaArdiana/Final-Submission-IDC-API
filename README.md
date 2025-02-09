
# API Documentation 📖


This API is designed to display book data, including the author's name and category. It provides a structured and efficient way to retrieve comprehensive book information, ensuring easy access and management. The API maintains a consistent JSON format, making it reliable.



## 🚀Installation

#### Tech

| Tools |  Version                |
| :-------- |  :------------------------- |
| `laravel` |    11 |


#### Pre Requisite

| Tools |  Version                | Description|
| :-------- |  :------------------------- |--|
| `Local Web Server` |  latest(recommended)    |Local Web Server Like : Laragon, Xampp, etc|
| `PHP` |    8.1 or higher |To Install Laravel.|
| `Code Editor` |   latest(recommended) |Code Editor Like : Vscode, Phpstorm, etc|
| `CLI` |   latest(recommended) |CLI Like : Gitbash, etc|
| `Postman` |   latest(recommended) |For API Testing|

#### Clone This Repository

```bash
git clone https://github.com/YogaArdiana/Final-Submission-IDC-API.git

cd Final-Submission-IDC-API
```
#### Composer Install

```bash
composer install
```
#### Create .env file and setup database
> Note: first create a database with a free name, for example: `final-submission-db` in dbms, then enter the database name in `DB_DATABASE=`

```env
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

## 📝Description Of Usual Server Responses

#### Explanation

| Code |  Status                | Description
| :-------- |  :------------------------- |-|
| `200` | OK ✅|The request was successful, and the response contains the requested data. |
| `201` | Created 🆕  |The request was successful, and new data was created. Typically used for resource creation.|
| `404` | Not Found ❌ |The requested data could not be found. This indicates that the resource does not exist.|
| `500` | Internal Server Error 🚨 |The server encountered an error while processing the request. This indicates an issue on the server-side.| 
| `422` | Unprocessable Entity ⚠️ |The request was well-formed but contains invalid data. This typically occurs when the input data does not meet the required validation rules.| 

## 📖Books Attributes

#### books_table

| Attributes |  Data Type                | Description
| :-------- |  :------------------------- |-|
| `id` | bigint|Unique identifier ( `Primary Key 🔑`) |
| `title` | varchar(255)  |Book Name|
| `description` | text |Book Description.|
| `author_id` | bigint |Relation to Authors Table (`Foreign Key 🗝️`)| 
| `category_id ` | bigint |Relation to Categories Table (`Foreign Key 🗝️`)| 

## ✍️Authors Attributes

#### authors_table

| Attributes |  Data Type                | Description
| :-------- |  :------------------------- |-|
| `id` | bigint|Unique identifier ( `Primary Key 🔑`) |
| `name` | varchar(255)  |Authors Name|
| `biography` | text |Authors Biography.|

## 🏷️Categories Attributes

#### categories_table

| Attributes |  Data Type                | Description
| :-------- |  :------------------------- |-|
| `id` | bigint|Unique identifier ( `Primary Key 🔑`) |
| `name` | varchar(255)  |Category Name|
| `description` | text |Category Biography.|







## 📥GET Method Example

####  `Books Model`

#### Get All Data

Books Url :
```bash
http://127.0.0.1:8000/api/v1/books
```
The URL will return data containing 5 book entries with author and category (name,id), pagination links, along with code, messages, and success status.

Result : 

```json
{
    "data": [
        {
            "id": 1,
            "title": "Ullam et iure rem sint beatae nam quia.",
            "description": "Eveniet fuga fugit omnis maxime beatae numquam. Voluptatibus incidunt architecto quis maxime consequatur sed. Qui dolores quis dolorem.",
            "author": {
                "id": 15,
                "name": "Destin Heidenreich"
            },
            "category": {
                "id": 3,
                "name": "maxime"
            },
            "created_at": "2025-01-29T14:53:56.000000Z",
            "updated_at": "2025-01-29T14:53:56.000000Z"
        },
        {
            "id": 2,
            "title": "Fugiat quo nisi est quis at modi.",
            "description": "Incidunt eum et corporis eligendi. Modi earum eos nihil voluptatem quo sed. Velit ducimus nam error voluptates nam voluptatibus quo voluptates. Odio ea et incidunt cumque.",
            "author": {
                "id": 37,
                "name": "Dr. Kip Kuhlman III"
            },
            "category": {
                "id": 10,
                "name": "quos"
            },
            "created_at": "2025-01-29T14:53:56.000000Z",
            "updated_at": "2025-01-29T14:53:56.000000Z"
        },
        {
            "id": 3,
            "title": "Repellat id nam modi aut consequatur consectetur culpa.",
            "description": "Et sit adipisci qui et blanditiis ut. Voluptatem saepe est quia debitis. Eum sed eligendi et laudantium ea.",
            "author": {
                "id": 4,
                "name": "Dr. Marvin Wolf"
            },
            "category": {
                "id": 6,
                "name": "eveniet"
            },
            "created_at": "2025-01-29T14:53:56.000000Z",
            "updated_at": "2025-01-29T14:53:56.000000Z"
        },
        {
            "id": 4,
            "title": "Eius nulla iure quo voluptas doloremque adipisci alias fugiat.",
            "description": "Dicta consectetur in possimus et. Excepturi laudantium quia cum ut officiis. Temporibus dignissimos ut consequatur sed et. Voluptatibus consequatur velit enim et voluptatem omnis.",
            "author": {
                "id": 26,
                "name": "Ms. Madelyn Gislason DDS"
            },
            "category": {
                "id": 5,
                "name": "pariatur"
            },
            "created_at": "2025-01-29T14:53:56.000000Z",
            "updated_at": "2025-01-29T14:53:56.000000Z"
        },
        {
            "id": 5,
            "title": "Veritatis eos quaerat nihil est.",
            "description": "Ut eum sunt est id cum quis aspernatur. Qui doloribus et officia aut eos quia. Alias nihil maxime qui sit omnis in in. Fugiat consectetur quis iste ea enim in. Possimus quidem natus quo culpa repellendus.",
            "author": {
                "id": 18,
                "name": "Fernando Wyman"
            },
            "category": {
                "id": 5,
                "name": "pariatur"
            },
            "created_at": "2025-01-29T14:53:56.000000Z",
            "updated_at": "2025-01-29T14:53:56.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/v1/books?page=1",
        "last": "http://127.0.0.1:8000/api/v1/books?page=100",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/v1/books?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 100,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=6",
                "label": "6",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=7",
                "label": "7",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=8",
                "label": "8",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=9",
                "label": "9",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=10",
                "label": "10",
                "active": false
            },
            {
                "url": null,
                "label": "...",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=99",
                "label": "99",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=100",
                "label": "100",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/v1/books",
        "per_page": 5,
        "to": 5,
        "total": 500
    },
    "success": true,
    "code": 200,
    "message": "Berhasil Mendapatkan Data",
    "total": 500
}
```

data format : 

```json

{
    "data": [
        {
            "id": ,
            "title": "",
            "description": "",
            "author": {
                "id": ,
                "name": ""
            },
            "category": {
                "id": 3,
                "name": ""
            },
            "created_at": "",
            "updated_at": ""
        }
    ],
    "links": {
    },
    "meta": {
    },
    "success": true,
    "code": 200,
    "message": "Berhasil Mendapatkan Data",
    "total": 500
}

```


####  `Author Model`

#### Get All Data

Authors Url :
```bash
http://127.0.0.1:8000/api/v1/authors
```
Result :

```json
{
    "data": [
        {
            "id": 1,
            "name": "Willow Herzog",
            "biography": "Vel placeat cupiditate modi ea quidem voluptatem non. Quo quam impedit nihil excepturi quas. Et nisi dicta et maiores architecto autem debitis. Nemo sint ut nam ducimus.",
            "book_total": 7,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        },
        {
            "id": 2,
            "name": "Prof. Carroll Lemke",
            "biography": "Cum est vel soluta expedita sunt cum ipsum unde. Aliquam voluptas officiis ad doloremque quasi.",
            "book_total": 7,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        },
        {
            "id": 3,
            "name": "Prof. Yvonne Harber V",
            "biography": "Vero occaecati voluptas ea culpa ea. Dolorum dolorem et qui atque aut. Dolor aut rerum delectus exercitationem sunt.",
            "book_total": 7,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        },
        {
            "id": 4,
            "name": "Dr. Marvin Wolf",
            "biography": "Qui possimus culpa omnis culpa sit incidunt. Ut voluptas labore voluptatem et. Laudantium amet est voluptas earum aspernatur vel. Rem voluptas voluptatem laboriosam adipisci eos quod.",
            "book_total": 12,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        },
        {
            "id": 5,
            "name": "Kole Quitzon",
            "biography": "Esse officiis voluptas eos. Omnis culpa est aut et. Perferendis earum quam incidunt officia. Eum in non sint dolorem cumque in.",
            "book_total": 13,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/v1/authors?page=1",
        "last": "http://127.0.0.1:8000/api/v1/authors?page=10",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/v1/authors?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 10,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=6",
                "label": "6",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=7",
                "label": "7",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=8",
                "label": "8",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=9",
                "label": "9",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=10",
                "label": "10",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/v1/authors",
        "per_page": 5,
        "to": 5,
        "total": 50
    },
    "success": true,
    "code": 200,
    "message": "Berhasil Mendapatkan Semua Data Author",
    "total": 50
}
```

data format : 

```http
{
"data": [
        {
            "id": ,
            "name": "",
            "biography": "",
            "book_total": ,
            "created_at": "",
            "updated_at": ""
        }
    ],
    "links": {
    },
    "meta": {
    },
    "success": true,
    "code": 200,
    "message": "Berhasil Mendapatkan Semua Data Author",
    "total": 500
}
```

####  `Category Model`

#### Get All Data

Category Url :
```bash
http://127.0.0.1:8000/api/v1/categories
```
Result :

```json
{
    "data": [
        {
            "id": 1,
            "name": "iure",
            "description": "Illo soluta et corporis deleniti quisquam maiores unde temporibus. Quo occaecati repellat alias quo id magni. Non aut omnis animi perferendis. Voluptas quisquam laborum sed dolor a sint consequatur.",
            "book_total": 47,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        },
        {
            "id": 2,
            "name": "sed",
            "description": "Et quasi laborum ratione animi cum et eum. Est aliquid sed id est voluptatum hic. Et animi sed facere voluptas provident. Rerum qui ut magni non.",
            "book_total": 52,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        },
        {
            "id": 3,
            "name": "maxime",
            "description": "Ea temporibus a ut eveniet molestiae optio architecto. Et sequi vero labore deleniti enim. Eius ut adipisci placeat iure dolorem.",
            "book_total": 57,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        },
        {
            "id": 4,
            "name": "illum",
            "description": "Nemo maiores ea maiores veritatis ea. Ducimus aliquam natus itaque consequuntur placeat ullam tempore id. Molestias nesciunt sit quaerat sed nemo commodi.",
            "book_total": 42,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        },
        {
            "id": 5,
            "name": "pariatur",
            "description": "Aperiam consequatur quae omnis dolores id expedita qui. Suscipit rerum deleniti fuga omnis provident. Necessitatibus a tempora modi. Et eaque cumque minima qui non quam maxime.",
            "book_total": 58,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/v1/categories?page=1",
        "last": "http://127.0.0.1:8000/api/v1/categories?page=2",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/v1/categories?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 2,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/categories?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/categories?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/categories?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/v1/categories",
        "per_page": 5,
        "to": 5,
        "total": 10
    },
    "success": true,
    "code": 200,
    "message": "Berhasil Mendapatkan Semua Data Category",
    "total": 10
}
```

data format : 
```json
{
    "data": [
        {
            "id": ,
            "name": "",
            "description": "",
            "book_total": ,
            "created_at": "",
            "updated_at": ""
        }
    ],
    "links": {
    },
    "meta": {
    },
    "success": true,
    "code": 200,
    "message": "Berhasil Mendapatkan Semua Data Category",
    "total": 10
}
```
####  `Book Model`

#### Get Data By Id

Books Url :
```bash
http://127.0.0.1:8000/api/v1/books/5
```
Result : 

```json
{
    "data": {
        "id": 5,
        "title": "Veritatis eos quaerat nihil est.",
        "description": "Ut eum sunt est id cum quis aspernatur. Qui doloribus et officia aut eos quia. Alias nihil maxime qui sit omnis in in. Fugiat consectetur quis iste ea enim in. Possimus quidem natus quo culpa repellendus.",
        "author": {
            "id" : 10
            "name": "Fernando Wyman"
        },
        "category": {
            "id" : 18
            "name": "pariatur"
        },
        "created_at": "2025-01-29T14:53:56.000000Z",
        "updated_at": "2025-01-29T14:53:56.000000Z"
    },
    "success": true,
    "code": 200,
    "message": "Data Buku Berhasil Ditemukan"
}
```

####  `Author Model`

#### Get Data By Id

Authors Url :
```bash
http://127.0.0.1:8000/api/v1/authors/5
```
Result : 

```json
{
    "data": {
        "id": 5,
        "name": "Kole Quitzon",
        "biography": "Esse officiis voluptas eos. Omnis culpa est aut et. Perferendis earum quam incidunt officia. Eum in non sint dolorem cumque in.",
        "book_total": 13,
        "created_at": "2025-01-29T14:53:55.000000Z",
        "updated_at": "2025-01-29T14:53:55.000000Z"
    },
    "success": true,
    "code": 200,
    "message": "Data Author Berhasil Ditemukan"
}
```

####  `Category Model`

#### Get Data By Id

Categories Url :
```bash
http://127.0.0.1:8000/api/v1/categories/5
```
Result : 

```json
{
    "data": {
        "id": 5,
        "name": "pariatur",
        "description": "Aperiam consequatur quae omnis dolores id expedita qui. Suscipit rerum deleniti fuga omnis provident. Necessitatibus a tempora modi. Et eaque cumque minima qui non quam maxime.",
        "book_total": 58,
        "created_at": "2025-01-29T14:53:55.000000Z",
        "updated_at": "2025-01-29T14:53:55.000000Z"
    },
    "success": true,
    "code": 200,
    "message": "Berhasil Mendapatkan Data Category"
}
```

####  `Book Model`

#### Get Data By Search

Books Url :
```bash
http://127.0.0.1:8000/api/v1/books?search=fugiat+quo
```
Result : 
```json
{
    "data": [
        {
            "id": 2,
            "title": "Fugiat quo nisi est quis at modi.",
            "description": "Incidunt eum et corporis eligendi. Modi earum eos nihil voluptatem quo sed. Velit ducimus nam error voluptates nam voluptatibus quo voluptates. Odio ea et incidunt cumque.",
            "author": {
                "id": 37,
                "name": "Dr. Kip Kuhlman III"
            },
            "category": {
                "id": 10,
                "name": "quos"
            },
            "created_at": "2025-01-29T14:53:56.000000Z",
            "updated_at": "2025-01-29T14:53:56.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/v1/books?page=1",
        "last": "http://127.0.0.1:8000/api/v1/books?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/books?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/v1/books",
        "per_page": 5,
        "to": 1,
        "total": 1
    },
    "success": true,
    "code": 200,
    "message": "Berhasil Mendapatkan Data",
    "total": 1
}
```


####  `Author Model`

#### Get Data By Search

Authors Url :
```bash
http://127.0.0.1:8000/api/v1/authors?search=Hilton
```
Result : 
```json
{
    "data": [
        {
            "id": 23,
            "name": "Prof. Hilton Lubowitz DDS",
            "biography": "Rem voluptas natus omnis non quidem quia fuga recusandae. Id iure molestias animi placeat culpa. Qui nisi ullam non molestiae at.",
            "book_total": 12,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/v1/authors?page=1",
        "last": "http://127.0.0.1:8000/api/v1/authors?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/authors?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/v1/authors",
        "per_page": 5,
        "to": 1,
        "total": 1
    },
    "success": true,
    "code": 200,
    "message": "Berhasil Mendapatkan Semua Data Author",
    "total": 1
}
```


####  `Category Model`

#### Get Data By Search

Categories Url :
```bash
http://127.0.0.1:8000/api/v1/categories/?search=pariatur
```
Result : 
```json
{
    "data": [
        {
            "id": 5,
            "name": "pariatur",
            "description": "Aperiam consequatur quae omnis dolores id expedita qui. Suscipit rerum deleniti fuga omnis provident. Necessitatibus a tempora modi. Et eaque cumque minima qui non quam maxime.",
            "book_total": 58,
            "created_at": "2025-01-29T14:53:55.000000Z",
            "updated_at": "2025-01-29T14:53:55.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/v1/categories?page=1",
        "last": "http://127.0.0.1:8000/api/v1/categories?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/categories?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/v1/categories",
        "per_page": 5,
        "to": 1,
        "total": 1
    },
    "success": true,
    "code": 200,
    "message": "Berhasil Mendapatkan Semua Data Category",
    "total": 1
}
```
####  `All Model`

#### Sorting Data Order By

- Latest
- Oldest

 Url :
```bash
http://127.0.0.1:8000/api/v1/model?order=latest
```

####  `Book Model`

#### Get Data based on id relationship

- ?author=
- ?category=

 Url :
```bash
http://127.0.0.1:8000/api/v1/books?author=20
```
```bash
http://127.0.0.1:8000/api/v1/books?category=10
```
## ➕POST Method Example

####  `Books Model`

#### Store Data

Books Url :
```bash
http://127.0.0.1:8000/api/v1/books
```

body : 
```json
{
   "title" : "Buku Kerajaan Ngawi",
   "description" : "Buku Yang Menceritakan Kisah Legenda",
   "author_id" : 10,
   "category_id" : 9
}
```

result : 
```json
{
    "data": {
        "id": 501,
        "title": "Buku Kerajaan Ngawi",
        "description": "Buku Yang Menceritakan Kisah Legenda",
        "author": {
            "id" : 10
            "name": "Lucile Zulauf"
        },
        "category": {
            "id" : 9
            "name": "voluptas"
        },
        "created_at": "2025-01-30T08:45:13.000000Z",
        "updated_at": "2025-01-30T08:45:13.000000Z"
    },
    "success": true,
    "code": 201,
    "message": "Data Berhasil Ditambahkan"
}
```

validation error Example : 
```json
{
    "success": false,
    "code" : 422,
    "message": "Validasi Error",
    "errors": {
        "category_id": [
            "Kategori yang dipilih tidak valid / tidak ada."
        ]
    }
}
```

####  `Author Model`

#### Store Data

Authors Url :
```bash
http://127.0.0.1:8000/api/v1/authors
```

body : 
```json
{
   "name" : "Yoga Ardiana",
   "biography" : "Seorang Penulis Yang Berbakat Asal Bali"
}
```

result : 
```json
{
    "data": {
        "id": 51,
        "name": "Yoga Ardiana",
        "biography": "Seorang Penulis Yang Berbakat Asal Bali",
        "book_total": 0,
        "created_at": "2025-01-30T08:48:49.000000Z",
        "updated_at": "2025-01-30T08:48:49.000000Z"
    },
    "success": true,
    "code": 201,
    "message": "Data Author Berhasil Disimpan"
}
```

validation error Example : 
```json
{
    "success": false,
    "code" : 422
    "message": "Validasi Error",
    "errors": {
        "name": [
            "Nama Penulis wajib diisi"
        ]
    }
}
```

####  `Category Model`

#### Store Data

Categories Url :
```bash
http://127.0.0.1:8000/api/v1/categories
```

body : 
```json
{
   "name" : "Legenda",
   "biography" : "Buku Buku Yang Menceritakan Kisah Kisah Legenda"
}
```

result : 
```json
{
    "data": {
        "id": 11,
        "name": "Legenda",
        "description": null,
        "book_total": 0,
        "created_at": "2025-01-30T08:53:08.000000Z",
        "updated_at": "2025-01-30T08:53:08.000000Z"
    },
    "success": true,
    "code": 201,
    "message": "Data Category Berhasil Disimpan"
}
```

validation error Example : 
```json
{
    "success": false,
    "code": 422
    "message": "Validasi Error",
    "errors": {
        "name": [
            "Nama Kategori harus diisi."
        ]
    }
}
```
## 🔄PUT Method Example

####  `Books Model`

#### Update Data

Books Url :
```bash
http://127.0.0.1:8000/api/v1/books/20
```
> Note: Only the fields that are filled in will be updated, the others will be ignored 

body :
```json
{
   "title" : "Buku Cinta", 
   "description" : "Buku Buku Yang Menceritakan Kisah Kisah Cinta",
   "author_id": 10,
   "category_id": 8
}
```

result : 
```json
{
    "data": {
        "id": 20,
        "title": "Buku Cinta",
        "description": "Buku Buku Yang Menceritakan Kisah Kisah Cinta",
        "author": {
            "id" : 10
            "name": "Lucile Zulauf"
        },
        "category": {
            "id" : 8
            "name": "nam"
        },
        "created_at": "2025-01-29T14:53:56.000000Z",
        "updated_at": "2025-01-30T08:57:51.000000Z"
    },
    "success": true,
    "code": 200,
    "message": "Data Buku Berhasil Diperbarui"
}
```

####  `Author Model`

#### Update Data

Authors Url :
```bash
http://127.0.0.1:8000/api/v1/authors/20
```
> Note: Only the fields that are filled in will be updated, the others will be ignored 

body :
```json
{
    "name" : "Mas Amba",
    "biography" : "penulis berbakat asal jawa timur"
}
```

result : 
```json
{
    "data": {
        "id": 20,
        "name": "Mas Amba",
        "biography": "penulis berbakat asal jawa timur",
        "book_total": 5,
        "created_at": "2025-01-29T14:53:55.000000Z",
        "updated_at": "2025-01-30T09:03:34.000000Z"
    },
    "success": true,
    "code": 200,
    "message": "Data Author Berhasil Diperbarui"
}
```

####  `Category Model`

#### Update Data

Categories Url :
```bash
http://127.0.0.1:8000/api/v1/categories/9
```
> Note: Only the fields that are filled in will be updated, the others will be ignored 

body :
```json
{
    "name" : "Buku Dewasa",
    "description" : "Buku Buku Yang Menceritakan Pahitnya Hidup"
}
```

result : 
```json
{
    "data": {
        "id": 9,
        "name": "Buku Dewasa",
        "description": "Buku Buku Yang Menceritakan Pahitnya Hidup",
        "book_total": 46,
        "created_at": "2025-01-29T14:53:55.000000Z",
        "updated_at": "2025-01-30T09:06:44.000000Z"
    },
    "success": true,
    "code": 200,
    "message": "Data Category Berhasil Diperbarui"
}
```

## 🗑️DELETE Method Example

####  `books`

#### delete Data

Model Url :
```bash
http://127.0.0.1:8000/api/v1/books/20
```

result :
```json
{
    "success": true,
    "code": 200,
    "message": "Data Buku Berhasil Dihapus"
}
```
####  `authors`

#### delete Data

Model Url :
```bash
http://127.0.0.1:8000/api/v1/authors/20
```

result :
```json
{
    "success": true,
    "code": 200,
    "message": "Data Author Berhasil Dihapus"
}
```
####  `categories`

#### delete Data

Model Url :
```bash
http://127.0.0.1:8000/api/v1/categories/20
```

result :
```json
{
    "success": true,
    "code": 200,
    "message": "Data Category Berhasil Dihapus"
}
```

> Note: If the Category/Author data is deleted, the book data related to that table will also be deleted


## 📜License

Make With ❤ By Yoga Ardiana, License : [MIT](https://choosealicense.com/licenses/mit/)

