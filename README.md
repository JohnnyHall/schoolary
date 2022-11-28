<p align="center">
  <img src="https://i.imgur.com/L8PWAHv.png" height='300'/>
</p>

# ✍️ Schoolary
> Projeto de gestão escolar

## 🎯 Objective
Criação de sistema capaz de gerenciar matrículas, cursos, professores e alunos
## 📜 Requirements
1. Laravel 8 or newer
2. Bootstrap 5 or newer
3. PHP >= 7.4 
4. OpenSSL PHP Extension
5. PDO PHP Extension
6. Laravel-debugbar 3.7 or newer
7. Mbstring PHP Extension
8. Tokenizer PHP Extension
9. XML PHP Extension

## ⚙️ Installation

```
docker-compose up -d

docker exec -it db sh
↳mysql -u root -p      senha:root
   ↳SHOW DATABASES;
   ↳GRANT ALL ON schoolary.* TO 'schoolary'@'%' IDENTIFIED BY 'secret';
   ↳FLUSH PRIVILEGES;
   ↳EXIT;

docker exec -it app sh
↳composer install
↳php artisan key:generate
↳php artisan config:cache
↳php artisan migrate:fresh --seed 


login: secretaria@puccampinas.edu.br
senha: password

```
  
## 🌎 Locales
Currently available locales are:
- Brazilian Portuguese (pt_br)

## 🤝 Contributing
1. [Fork the repository](https://github.com/JohnnyHall/schoolary/fork)
2. Clone your fork: `git clone https://github.com/JohnnyHall/schoolary.git`
3. Stage changes `git add .`
4. Commit your changes: `cz` OR use `git commit`
5. Submit a pull request

## 🖌️ Themes

## 🤝 Related Projects

## 👤 Developers
 - João Victor Rokemback Tápparo
 - Felipe Yabiko Nogueira
 - Tiago Gontijo Merighi
 - Lucas Bertola da Silva

<p align="center">
  Created on <br>
  15/11/2022 
</p>

https://github.com/barryvdh/laravel-debugbar
