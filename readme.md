# Todoアプリ by PHP Laravel

## 概要
- CRUDの練習としてTodoアプリ作成した
- 簡易的なもののためSQLiteを使った
- MVCアーキテクチャ 

## 方針

### テーブル
- id
    - ID
- task_name
    - タスクの名前
- task_description
    - タスクの説明
- assign_person_name
    - 担当者の名前(認証機能実装しないから)
- estimate_hour
    - 見積時間

### ルーティング
- `GET /`:`TodolistFormController@index`
    - トップページを返す
- `GET /create-page`:`TodolistFormController@createPage`
    - タスクの作成ページを返す
- `POST /create`:`TodolistFormController@create`
    - タスクの作成実行
- `GET /edit-page`:`TodolistFormController@editPage`
    - タスクの編集ページ
- `POST /edit`:`TodolistFormController@edit`
    - タスクの編集を実行
- `GET /delete-page`:`TodolistFormController@deletePage`
    - タスクの削除ページを返す
- `POST /delete`:`TodolistFormController@delete`
    - タスクの削除を実行
## 作業進捗
- `composer create-project laravel_todolist`でプロジェクト作成

### テーブル作成
- SQLite3使う
    - `database/database.sqlite`作成
- `.env`ファイル編集して`DB_CONNECTION=sqlite`とした
- マイグレーション実行
    - `sqlite3 database/database.sqlite`で接続確認可能
    - `.table`で確認可能
- マイグレーションファイル作成
    - `php artisan make:migration create_todos_table --create=todos`
- todosテーブル作成
    - マイグレーションファイルの`create`にカラム追加

### モデルクラスを実装
- `php artisan make:model Todo`で作成
    - `app/Todo.php`が生成される

### コントローラの作成
- `php artisan make:controller TodolistFormCOntroller`で作成
    - `app/Http/Controllers/TodolistFormController.php`が作成される

### ビューの作成
- `resources/views`に`todo_list.blade.php`を作成
    - artisanコマンドで作成できないらしい

### ルーティングの設定
- `routes/web.php`を編集する

### CRUD実装
- 方針にある通りにルーティングをおこない、コントローラに関数を作りビュー作る