# mogitate - CheckTest2

### Dockerビルド
  ```
  git clone git@github.com:mutoryoko/mogitate.git
  docker compose up -d --build
  ```

### Laravel環境構築
  ```
  docker compose exec php bash
  composer install
  ```
 .env.exampleファイルからenvファイルを作成し、環境変数を変更
  ```
  php artisan key:generate
  php artisan migrate
  php artisan db:seed
  ```

## 使用技術
<ul>
	<li>PHP: 7.4.9</li>
	<li>Laravel Framework: 8.83.29</li>
	<li>mysql: 8.0.26</li>
</ul>

## ER図
![image](mogitate-er.drawio.svg)

## URL
<ul>
	<li>開発環境: <a href="http://localhost/">http://localhost/</a> </li>
	<li>phpmyadmin: <a href="http://localhost:8080">http://localhost:8080/</a> </li>
</ul>
